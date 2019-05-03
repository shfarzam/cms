<?php

class Bootstrap
{
    private $_url = null;
    private $_controller = null;

    function __construct()
    {
        Session::init();
        //
    }

    // RUN Method to make pages
    public function run()
    {
        $this->_getUrl();

        $this->_loadController();
    }

    // Create Models and Controllers
    function call()
    {
        $url = $this->_url;

        if ($this->CheckFile($url[0])) {

            $this->_controller = new $url[0];
            $this->_controller->LoadModel($url[0]);
            $length = count($url);
            if($length > 1) {
                if (!method_exists($this->_controller, $url[1])) {
                    $this->_Error();
                    return false;
                }
            }
                $length--;
                switch ($length) {
                    case  5:
                        $this->_controller->{$url[1]}($url[2], $url[3], $url[4], $url[5]);
                        break;
                    case  4:
                        $this->_controller->{$url[1]}($url[2], $url[3], $url[4]);
                        break;
                    case  3:
                        $this->_controller->{$url[1]}($url[2], $url[3]);
                        break;
                    case  2:
                        $this->_controller->{$url[1]}($url[2]);
                        break;
                    case  1:
                        $this->_controller->{$url[1]}();
                        break;
                    default:
                        $this->_controller->index();
                        break;
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
            $this->_Error();
        }
    }

    private function _getUrl()
    {
        $url = isset($_GET['first']) ? $_GET['first'] : null;
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $this->_url = $url = explode('/', (rtrim($url, '/')));
    }

    private function _loadController()
    {
        if (empty($this->_url[0])) {
            require './controllers/index.php';
            $controller = new Index();
            $controller->index();
            return false;
        } else {
            $this->call();
        }
    }

    //Show Error Page
    private function _Error()
    {
        require './controllers/404.php';
        $controller = new Er();
        $controller->index();
        return false;
    }
}