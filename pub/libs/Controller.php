<?php

class Controller
{
    function __construct()
    {
        //echo 'Main Controller<br>';
        $this->view = new View();
    }

    public function LoadModel($name)
    {
        $path = 'models/' . $name . 'Model.php';

        if (file_exists($path)) {
            require 'models/' . $name . 'Model.php';
            $modelName = $name . 'Model';
            $this->model = new $modelName;
        }
    }
}
