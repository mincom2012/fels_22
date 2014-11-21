<?php

/**
 * Created by PhpStorm.
 * User: Minh
 * Date: 11/21/14
 * Time: 1:43 PM
 */
App::uses('AppController', 'Controller');

class ManagerController extends AppController {

    public $uses = array('Category', 'User', 'Word', 'Answer');
    public $components = array('Paginator');

    public function index()
    {

    }

    public function viewCategory()
    {
        $this->Category->recursive = 0;
        $this->set('categories', $this->Paginator->paginate('Category'));
        $this->render('view_category');
    }

    public function detailCategory($id = null)
    {
        if ($this->request->is(array('post', 'put'))) {
            if (!$id) {
                $this->Category->create();
            }
            $data = $this->request->data;
            $data['Category']['created_date'] = date("Y-m-d H:i:s");
            $data['Category']['updated_date'] = date("Y-m-d H:i:s");
            if ($this->Category->save($data)) {
                $this->Session->setFlash(__('The category has been saved.'), 'default', array('class' => 'alert alert-success'));
                return $this->redirect(array('controller' => 'Manager', 'action' => 'viewCategory'));
            } else {
                $this->Session->setFlash(__('The category could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
            }
        }
        if ($id) {
            $options = array('conditions' => array('Category.' . $this->Category->primaryKey => $id));
            $this->request->data = $this->Category->find('first', $options);
        }
        $this->render('detail_category');
    }

    public function deleteCategory($id)
    {
        $this->Category->id = $id;
        if (!$this->Category->exists()) {
            throw new NotFoundException(__('Invalid category'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Category->delete()) {
            $this->Session->setFlash(__('The category has been deleted.'), 'default', array('class' => 'alert alert-success'));
        } else {
            $this->Session->setFlash(__('The category could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
        }
        return $this->redirect(array('controller' => 'Manager', 'action' => 'viewCategory'));
    }



}