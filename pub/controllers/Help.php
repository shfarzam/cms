<?php

class Help extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->view->title = 'Help';
        $this->view->msg = '....this is HELP...';
        $this->view->Render('help/index');
    }

    public function other($arg = false)
    {
        $this->view->msg = '123';
    }
}
