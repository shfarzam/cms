<?php

class Auth
{
    public function HandleLogin($data = null)
    {
        $logIn = Session::get('logIn');
        $type = Session::get('type');

        if ( ($logIn == false) || (isset($data) && ($data != $type))) {
            Session::destroy();
            header('location: ' . URL . 'Login');
        }
    }
}
