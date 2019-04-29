<?php

class Database
{
    private $dsn = "mysql:dbname=test_db;host=db";
    private $user = "sh";
    private $password = "12345";
    public $con;

    public function getConnection(){

        $this->con = null;

        try {
            $this->con = new PDO($this->dsn, $this->user, $this->password);
            $this->con->exec("set names utf8");
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
        return $this->con;

    }
}
