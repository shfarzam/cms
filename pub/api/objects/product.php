<?php
class Person
{
    private $con;
    private $table_name = "Persons";

    public $PersonID;
    public $FirstName;
    public $LastName;

    public function __construct($db)
    {
        $this->con = $db;
    }

    public function readAll()
    {
        $query="SELECT PersonID ,FirstName, LastName FROM ".$this->table_name;


        $stmt = $this->con->prepare($query);

        $stmt->execute();
        return $stmt;
    }
}
