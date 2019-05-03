<?php

//config
require 'config.php';

//autoloader

function __autoload($class)
{
    $file = LIBS . $class . ".php";
    if (file_exists($file))
        require $file;
}


$app = new Bootstrap();
$app->run();

