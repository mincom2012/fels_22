<?php

/**
 * Created by PhpStorm.
 * User: Minh
 * Date: 11/19/14
 * Time: 8:44 AM
 */

App::uses('AppController', 'Controller');

class ManagerController extends AppController
{
    public $uses = array('Manager','User', 'Category', 'Word', 'Answer');

    public function index()
    {
        $this->render();
    }

    public function categories()
    {
        $this->render('category');
    }

    public function wordlists()
    {
        $this->render('wordlist');
    }

    public function results()
    {
        $this->render('result');
    }

    public function users()
    {
        $this->render('user');
    }


}