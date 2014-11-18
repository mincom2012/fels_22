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
}
