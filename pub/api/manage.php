<?php

class manage
{
    private $entryId;
    public $api_key = '12c65aa1362m10d14';

    function __construct($entryId)
    {
        $this->entryId = $entryId;
    }

    function deleteEntry()
    {

        //delete $this->entryId from database
    }
    public  function hasPermission($key)
    {

        if ($key == $this->api_key) {
            return true;

        } else {
            return false;
        }

    }
}