<?php

class Model
{
    function __construct()
    {
        $this->db = new DB(DbType, DbName, DbHost, DbUser, DbPass);
    }
}
