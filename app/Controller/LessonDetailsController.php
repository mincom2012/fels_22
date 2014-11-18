<?php
App::uses('AppController', 'Controller');
/**
 * LessonDetails Controller
 *
 * @property LessonDetail $LessonDetail
 * @property PaginatorComponent $Paginator
 */
class LessonDetailsController extends AppController {

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
		$this->LessonDetail->recursive = 0;
		$this->set('lessonDetails', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->LessonDetail->exists($id)) {
			throw new NotFoundException(__('Invalid lesson detail'));
		}
		$options = array('conditions' => array('LessonDetail.' . $this->LessonDetail->primaryKey => $id));
		$this->set('lessonDetail', $this->LessonDetail->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->LessonDetail->create();
			if ($this->LessonDetail->save($this->request->data)) {
				$this->Session->setFlash(__('The lesson detail has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The lesson detail could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$lessonDetails = $this->LessonDetail->LessonDetail->find('list');
		$categories = $this->LessonDetail->Category->find('list');
		$words = $this->LessonDetail->Word->find('list');
		$lessons = $this->LessonDetail->Lesson->find('list');
		$users = $this->LessonDetail->User->find('list');
		$this->set(compact('lessonDetails', 'categories', 'words', 'lessons', 'users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->LessonDetail->exists($id)) {
			throw new NotFoundException(__('Invalid lesson detail'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->LessonDetail->save($this->request->data)) {
				$this->Session->setFlash(__('The lesson detail has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The lesson detail could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('LessonDetail.' . $this->LessonDetail->primaryKey => $id));
			$this->request->data = $this->LessonDetail->find('first', $options);
		}
		$lessonDetails = $this->LessonDetail->LessonDetail->find('list');
		$categories = $this->LessonDetail->Category->find('list');
		$words = $this->LessonDetail->Word->find('list');
		$lessons = $this->LessonDetail->Lesson->find('list');
		$users = $this->LessonDetail->User->find('list');
		$this->set(compact('lessonDetails', 'categories', 'words', 'lessons', 'users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->LessonDetail->id = $id;
		if (!$this->LessonDetail->exists()) {
			throw new NotFoundException(__('Invalid lesson detail'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->LessonDetail->delete()) {
			$this->Session->setFlash(__('The lesson detail has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The lesson detail could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
