<?php

function __autoload($class_name)
{
    include 'classes/'.$class_name.'.php';
}

class Connection
{
    private function __construct()
    {
        echo 'New object created <br>';
    }

    public static function getInstance()
    {
        static $instance = null;
        if(null == $instance){
            $instance = new static();
        } else {
            echo 'using existing object <br>';
        }
    }
}

$object1= Connection::getInstance();
$object2= Connection::getInstance();
$object3= Connection::getInstance();

$paypal = new Paypal();
$paypal->sendPayment(1000);

$paypal = new PayPalAdapter();
$paypal->pay(1500);

$visa = new VisaAdapter();
$visa->pay(17500);