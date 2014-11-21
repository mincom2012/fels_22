<?php
App::uses('AppController', 'Controller');
/**
 * Lessons Controller
 *
 * @property Lesson $Lesson
 * @property PaginatorComponent $Paginator
 */
class LessonsController extends AppController {

/**
 * Components
 *
 * @var array
 */
    public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
    public function index() {
        $this->Lesson->recursive = 0;
        $this->set('lessons', $this->Paginator->paginate());
    }

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function view($id = null) {
        if (!$this->Lesson->exists($id)) {
            throw new NotFoundException(__('Invalid lesson'));
        }
        $options = array('conditions' => array('Lesson.' . $this->Lesson->primaryKey => $id));
        $this->set('lesson', $this->Lesson->find('first', $options));
    }

/**
 * add method
 *
 * @return void
 */
    public function add() {
        if ($this->request->is('post')) {
            $this->Lesson->create();
            if ($this->Lesson->save($this->request->data)) {
                $this->Session->setFlash(__('The lesson has been saved.'), 'default', array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The lesson could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
            }
        }
        $lessons = $this->Lesson->Lesson->find('list');
        $categories = $this->Lesson->Category->find('list');
        $users = $this->Lesson->User->find('list');
        $this->set(compact('lessons', 'categories', 'users'));
    }

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function edit($id = null) {
        if (!$this->Lesson->exists($id)) {
            throw new NotFoundException(__('Invalid lesson'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Lesson->save($this->request->data)) {
                $this->Session->setFlash(__('The lesson has been saved.'), 'default', array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The lesson could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
            }
        } else {
            $options = array('conditions' => array('Lesson.' . $this->Lesson->primaryKey => $id));
            $this->request->data = $this->Lesson->find('first', $options);
        }
        $lessons = $this->Lesson->Lesson->find('list');
        $categories = $this->Lesson->Category->find('list');
        $users = $this->Lesson->User->find('list');
        $this->set(compact('lessons', 'categories', 'users'));
    }

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function delete($id = null) {
        $this->Lesson->id = $id;
        if (!$this->Lesson->exists()) {
            throw new NotFoundException(__('Invalid lesson'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Lesson->delete()) {
            $this->Session->setFlash(__('The lesson has been deleted.'), 'default', array('class' => 'alert alert-success'));
        } else {
            $this->Session->setFlash(__('The lesson could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    // Create new lesson
    public function new_lesson($categoryId) {
        $words = $this->Lesson->Word->find('all',
            array(
                'fields'    => array('Word.word_id', 'Word.word_source'),
                'conditions'=> array('Word.category_id' => $categoryId),
                'order'     => 'RAND()',
                'limit'     => 20
            )
        );
        $categoryName = $this->Lesson->Category->find('first', 
            array(
                'fields'    => array('Category.category_name'),
                'conditions'=> array('Category.category_id' => $categoryId)
            )
        );
        $this->set('categoryId', $categoryId);
        $this->set('categoryName', $categoryName['Category']['category_name']);
        $this->set('words', $words);
    }

    // Save lesson and lesson-detail
    public function result() {
        $this->autoRender = false;
        $data = $this->request->data;
        $words = array_shift($data['words']);
        $answers = array_shift($data['answers']);
        $categoryId = $data['categoryId'];
        $userId = $this->Auth->user('user_id');

        $score = $this->Lesson->Word->Answer->find('count',
            array(
                'conditions' => array(
                    'Answer.is_correct' => '1',
                    array('Answer.id' => $answers)
                )
            )
        );

        // Save lesson
        $this->Lesson->create();
        $data = array( 
            'category_id' => $categoryId, 
            'result' => $score, 
            'user_id' => $userId
        );
        $this->Lesson->save($data, array('validate' => 'false'));
        $lastId = $this->Lesson->id;
        $this->Lesson->clear();

        $data = array();
        // Save lesson details
        //for ($i = 1; $i < count($words); $i ++) {
        foreach ($words as $i => $word) {
            $data[] = array(
                'LessonDetail' => array(
                    'category_id'   => $categoryId,
                    'word_id'       => $word,
                    'lesson_id'     => $lastId,
                    'user_id'       => $userId,
                    'answer_id'     => $answers[$i]
                )
            );
        }
        $this->Lesson->LessonDetail->saveMany($data, array('validate' => 'false'));
        $this->Lesson->LessonDetail->clear();

        return json_encode($lastId);
    }

    public function view_result($lesson_id) {
        $lessons = $this->Lesson->LessonDetail->find('all',
            array(
                'conditions' => array(
                    'LessonDetail.lesson_id' => $lesson_id
                ),
                'fields' => array(
                    'Lesson.result', 
                    'LessonDetail.answer_id', 
                    'Category.category_name', 
                    'Word.word_source'
                )
            )
        );
        $categoryName = $lessons[0]['Category']['category_name'];
        $result = $lessons[0]['Lesson']['result'];
        $answerIds = [];
        foreach ($lessons as $lesson) {
            $answerIds[] = $lesson['LessonDetail']['answer_id'];
        }

        $answers = $this->Lesson->Word->Answer->find('all',
            array(
                'conditions' => array('Answer.id' => $answerIds),
                'fields'     => array('Answer.id', 'Answer.answer', 'Answer.is_correct')
            )
        );
        $answerKeys = [];
        foreach ($answers as $answer) {
            $id = $answer['Answer']['id'];
            $answerKeys[$id] = array($answer['Answer']['is_correct'], $answer['Answer']['answer']);
        }
        $this->set('lessons', $lessons);
        $this->set('result', $result);
        $this->set('answers', $answerKeys);
        $this->set('categoryName', $categoryName);
    }
}
