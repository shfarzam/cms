<?php


class UserModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function userList()
    {
        return $this->db->select("SELECT id, user, type FROM users ");



    }
    public function userList2($id)
    {

        if(isset($id)) {
            return $this->db->select ("SELECT id, user, type FROM users WHERE id =:id", array('id' => $id));
        }

    }
    public function create($postData)
    {
        $this->db->insert('users',$postData);
    }


    public function editSave($id,$postData)
    {
        $this->db->update('users', $postData, "id=$id");
    }


    public function delete($id)
    {

        $this->db->delete('users', " id= '$id'");

    }

}