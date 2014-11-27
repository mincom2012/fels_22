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
    public $components = array('Paginator', 'Upload');

    public function index() {
        $this->redirect(array('controller' => 'Manager', 'action' => 'view_category'));
    }

    public function view_category() {
        $this->Category->recursive = 0;
        $this->set('categories', $this->Paginator->paginate('Category'));
        $this->render('view_category');
    }

    public function detail_category($id = null) {
        if ($this->request->is(array('post', 'put'))) {
            if (!$id) {
                $this->Category->create();
            }
            $data = $this->request->data;

            if ($this->Category->save($data)) {
                $this->Session->setFlash(__('The category has been saved.'), 'default', array('class' => 'alert alert-success'));
                return $this->redirect(array('controller' => 'Manager', 'action' => 'view_category'));
            } else {
                $this->Session->setFlash(__('The category could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
            }
        }

        $titlePage = __('Add Category');
        if ($id) {
            $options = array('conditions' => array('Category.' . $this->Category->primaryKey => $id));
            $this->request->data = $this->Category->find('first', $options);
            $titlePage = __('Edit Category');
        }

        $this->set('titlePage', $titlePage);
        $this->render('detail_category');
    }

    public function delete_category($id) {
        $this->Category->id = $id;
        if (!$this->Category->exists()) {

            return $this->redirect(array('controller' => 'Manager', 'action' => 'view_category'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Category->delete()) {
            $this->Session->setFlash(__('The category has been deleted.'), 'default', array('class' => 'alert alert-success'));
        } else {
            $this->Session->setFlash(__('The category could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
        }
        return $this->redirect(array('controller' => 'Manager', 'action' => 'view_category'));
    }

    public function view_word() {
        $this->Word->recursive = 0;
        $this->set('words', $this->Paginator->paginate('Word'));
        $this->render('view_word');
    }

    public function detail_word($id = null) {
        $data = $this->request->data;
        if ($this->request->is(array('post', 'put'))) {
            if (!$id) {
                $this->Word->create();
            } else {
                $data['Word']['id'] = $id;
            }

            if ($this->Word->saveAssociated($data)) {
                $this->Session->setFlash(__('The word has been saved.'), 'default', array('class' => 'alert alert-success'));
                return $this->redirect(array('controller' => 'Manager', 'action' => 'view_word'));
            } else {
                $this->Session->setFlash(__('The word could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
            }
        } else {

        }

        $titlePage = __('Add Word');
        if ($id) {
            $options = array('conditions' => array('Word.' . $this->Word->primaryKey => $id));
            $word = $this->Word->find('first', $options);
            $this->request->data = $word;
            $titlePage = __('Edit Word');
        }

        $category = $this->Category->find('list', array('fields' => array('id', 'category_name')));
        $this->set('categories', $category);

        $this->set('titlePage', $titlePage);

        $this->render('detail_word');
    }

    public function delete_word($id) {
        $this->Word->id = $id;
        if (!$this->Word->exists()) {
            return $this->redirect(array('controller' => 'Manager', 'action' => 'view_word'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Word->delete()) {
            $this->Session->setFlash(__('The word has been deleted.'), 'default', array('class' => 'alert alert-success'));
        } else {
            $this->Session->setFlash(__('The word could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
        }
        return $this->redirect(array('controller' => 'Manager', 'action' => 'view_word'));
    }

    public function view_user() {
        $this->User->recursive = 0;
        $this->set('users', $this->Paginator->paginate('User'));
        $this->render('view_user');
    }

    public function detail_user($id = null) {
        if ($this->request->is(array('post', 'put'))) {
            if (!$id) {
                $this->User->create();
            }

            $data = $this->request->data;
            $data['User']['id'] = $id;

            //upload file to server
            $fileName = $this->Upload->upload($data['User']['upload']);
            if (!empty($fileName) && $fileName != $data['User']['avatar']) {
                //Remove file old
                $this->Upload->delete($data['User']['avatar']);
            }

            $data['User']['avatar'] = $fileName;

            if ($this->User->save($data)) {
                $this->Session->setFlash(__('The user has been saved.'), 'default', array('class' => 'alert alert-success'));
                return $this->redirect(array('controller' => 'Manager', 'action' => 'view_user'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
            }
        }

        $titlePage = __('Add User');
        if ($id) {
            $this->User->recursive = 2;
            $this->request->data = $this->User->findByid($id);

            $titlePage = __('Edit User');
        }

        $this->set('titlePage', $titlePage);
        $this->render('detail_user');

    }

    public function delete_user($id) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->User->delete()) {
            $this->Session->setFlash(__('The user has been deleted.'), 'default', array('class' => 'alert alert-success'));
        } else {
            $this->Session->setFlash(__('The user could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
        }
        return $this->redirect(array('controller' => 'Manager', 'action' => 'view_user'));
    }
}