<?php

class api
{
    private $api_key = "12c65aa1362m10d14";
    public $connect;

    public function validApi($id)
    {
        if($id == $this->api_key){
            $this->connect=true;
        }else {
            $this->connect=false;
        }
        return $this->connect;
    }
}
