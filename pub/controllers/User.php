<?php

class User extends Controller
{

    function __construct()
    {
        parent::__construct();
        $logIn = Session::get('logIn');
        $type = Session::get('type');

        if ($logIn == false || $type != 'admin') {
            Session::destroy();
            header('location: ' . URL . 'Login');
        }
    }

    function index()
    {
        $this->view->userList = $this->model->userList();
        $this->view->Render('user/index');
    }

    public function create()
    {
        $postData = array('user' => $_POST['user'],
            'pass' => Hash::create('sha256', $_POST['pass'], HASH_PASSWORD_KEY),
            'type' => $_POST['type']
        );
        $this->model->create($postData);
        $this->index();
    }

    public function edit($id = null)
    {
        if (isset($id)) {
            $this->view->user = $this->model->userList2($id);
        }
        $this->view->Render('user/edit');
    }

    public function editSave($id = null)
    {
        if (isset($id)) {
            $postData = array('user' => $_POST['user'],
                'pass' => Hash::create('sha256', $_POST['pass'], HASH_PASSWORD_KEY),
                'type' => $_POST['type']

            );
            $this->model->editSave($id, $postData);
        }
        $this->index();
    }

    public function delete($id = 1)
    {
        if ($id == 1) {
            header('location: ' . URL . 'User');
            return false;
        }
        $this->model->delete($id);
        $this->index();
    }


}
