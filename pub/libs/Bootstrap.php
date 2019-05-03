<?php

class Bootstrap
{
    function __construct()
    {
        Session::init();
        //
    }

    // RUN Method to make pages
    public function run()
    {
        $url = isset($_GET['first']) ? $_GET['first'] : null;
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $url = explode('/', (rtrim($url, '/')));

        if (empty($url[0])) {
            require './controllers/index.php';
            $controller = new Index();
            $controller->index();
            return false;
        } else {
            $this->call($url);
        }


    }

    // Create Models and Controllers
    function call($url)
    {
        if ($this->CheckFile($url[0])) {
            $controller = new $url[0];
            $controller->LoadModel($url[0]);

            if (isset($url[2])) {
                $this->FindPage($controller, $url[1], $url[2]);
            } elseif (isset($url[1])) {
                $this->FindPage($controller, $url[1]);
            } else {
                $controller->index();
            }

        }

    }

    //Check If Controller File is available
    function CheckFile($url)
    {
        $file = 'controllers/' . $url . '.php';

        if (file_exists($file)) {
            return require $file;
        } else {
            $this->Error();
            return false;
        }
    }

    //Find URL to show that
    function FindPage($controller, $item1, $item2 = null)
    {
        if (isset($item2) && method_exists($controller, $item1)) {
            $controller->{$item1}($item2);
        } elseif (isset($item1) && method_exists($controller, $item1)) {
            $controller->{$item1}();
        } else {
            $this->Error();
        }
    }

    //Show Error Page
    function Error()
    {
        require './controllers/404.php';
        $controller = new Er();
        $controller->index();
        return false;
    }
}