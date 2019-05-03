<?php

class View
{
    function __construct()
    {

    }

    public function Render($name, $noInclude = false)
    {
        if ($noInclude == true) {
            require './views/' . $name . '.php';
        } else {
            require_once './views/header.php';
            require_once './views/' . $name . '.php';
            require_once './views/footer.php';

        }

    }
}