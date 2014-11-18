<?php
App::uses('AppController', 'Controller');
/**
 * Words Controller
 *
 * @property Word $Word
 * @property PaginatorComponent $Paginator
 */
class WordsController extends AppController {

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
		$this->Word->recursive = 0;
		$this->set('words', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Word->exists($id)) {
			throw new NotFoundException(__('Invalid word'));
		}
		$options = array('conditions' => array('Word.' . $this->Word->primaryKey => $id));
		$this->set('word', $this->Word->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Word->create();
			if ($this->Word->save($this->request->data)) {
				$this->Session->setFlash(__('The word has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The word could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$words = $this->Word->Word->find('list');
		$categories = $this->Word->Category->find('list');
		$this->set(compact('words', 'categories'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Word->exists($id)) {
			throw new NotFoundException(__('Invalid word'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Word->save($this->request->data)) {
				$this->Session->setFlash(__('The word has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The word could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Word.' . $this->Word->primaryKey => $id));
			$this->request->data = $this->Word->find('first', $options);
		}
		$words = $this->Word->Word->find('list');
		$categories = $this->Word->Category->find('list');
		$this->set(compact('words', 'categories'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Word->id = $id;
		if (!$this->Word->exists()) {
			throw new NotFoundException(__('Invalid word'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Word->delete()) {
			$this->Session->setFlash(__('The word has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The word could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
