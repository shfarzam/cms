<?php

class Er extends Controller
{
    function __construct()
    {
        parent::__construct();

    }

    function index()
    {
        $this->view->msg = null;
        $this->view->msg = '....Page NOT Found !!!!!!!';
        $this->view->Render('404/index');
    }


}
