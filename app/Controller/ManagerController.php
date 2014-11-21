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

        $titlePage = 'Add Category';
        if ($id) {
            $options = array('conditions' => array('Category.' . $this->Category->primaryKey => $id));
            $this->request->data = $this->Category->find('first', $options);
            $titlePage = 'Edit Category';
        }

        $this->set('titlePage', $titlePage);
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

//    implement word

    public function viewWord()
    {
        $this->Word->recursive = 0;
        $this->set('words', $this->Paginator->paginate('Word'));
        $this->render('view_word');
    }

    public function detailWord($id = null)
    {
        $data = $this->request->data;
        if ($this->request->is(array('post', 'put'))) {
            if (!$id) {
                $this->Word->create();
            } else {
                $data['Word']['id'] = $id;
                $data['Word']['created_date'] = date("Y-m-d H:i:s");
            }
//            $data['Answer'][] = array(
//                'answer' => 'Answer 3',
//                'is_correct' => 1
//            );
            $data['Word']['updated_date'] = date("Y-m-d H:i:s");

            if ($this->Word->saveAssociated($data)) {
                $this->Session->setFlash(__('The word has been saved.'), 'default', array('class' => 'alert alert-success'));
                return $this->redirect(array('controller' => 'Manager', 'action' => 'viewWord'));
            } else {
                $this->Session->setFlash(__('The word could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
            }
        }

        $titlePage = 'Add Word';
        if ($id) {
            $options = array('conditions' => array('Word.' . $this->Word->primaryKey => $id));
            $this->request->data = $this->Word->find('first', $options);
            $titlePage = 'Edit Word';
        }

        $category = $this->Category->find('list', array('fields' => array('id', 'category_name')));
        $this->set('categories', $category);

        $this->set('titlePage', $titlePage);

        $this->render('detail_word');
    }

    public function deleteWord($id)
    {
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
        return $this->redirect(array('controller' => 'Manager', 'action' => 'viewWord'));
    }

}