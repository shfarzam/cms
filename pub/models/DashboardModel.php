<?php

class DashboardModel extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function XhrInsert($data)
    {
        $stmt = $this->db->prepare('INSERT INTO users (user, pass, type) VALUES (:user, :pass, :type)');
        $stmt->execute($data);
    }

    function XhrGetList()
    {
        $data = null;
        $data = $this->db->select("SELECT * FROM users ");
        echo json_encode($data);
    }

    function XhrDelList($id)
    {
        $this->db->delete('users', " id= '$id'");
    }
}