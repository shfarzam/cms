<?php

class Dashboard extends Controller
{

    function __construct()
    {
        parent::__construct();
        Auth::HandleLogin();
        $this->view->js = array('dashboard/js/ajax.js');
    }

    function index()
    {
        $this->view->title = 'Dashboard';
        $this->view->Render('dashboard/index');
    }

    function logout()
    {
        Session::destroy();
        header('location: ' . URL . 'Login');
    }

    function XhrInsert()
    {
        $data = array(':user' => $_POST['user'],
            ':pass' => Hash::create('sha256', $_POST['pass'], HASH_PASSWORD_KEY),
            ':type' => $_POST['type']);

        $this->model->XhrInsert($data);

    }

    function XhrGetList()
    {
        $this->model->XhrGetList();
    }

    function XhrDelList()
    {
        $id = $_POST['id'];
        $this->model->XhrDelList($id);
    }
}
