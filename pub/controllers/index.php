<?php

class Index extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->view->title = 'Index';
        $this->view->msg = '....this is index...';
        $this->view->Render('index/index');
    }
}
