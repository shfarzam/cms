<?php

class Login extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->view->title = 'Login';
        $this->view->Render('login/index');
    }

    function run()
    {
        $postData = array('user' => $_POST['user'],
            'pass' => Hash::create('sha256', $_POST['pass'], HASH_PASSWORD_KEY)
        );
        $this->model->run($postData);
    }

}
