<?php

class LoginModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function run($postData)
    {
        $stmt = $this->db->select("SELECT id,type FROM users WHERE user =:user AND pass =:pass", $postData);

        $count = count($stmt);

        if ($count > 0) {
            Session::set('logIn', true);
            Session::set('user', $postData['user']);
            $data = $stmt[0];
            Session::set('type', $data['type']);
            header('location: ' . URL . 'Dashboard');
        } else {
            Session::init();
            Session::set('logIn', false);
            header('location:  ' . URL . 'Login');
        }


    }
}