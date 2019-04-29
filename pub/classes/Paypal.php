<?php


class Paypal
{
    public function __construct()
    {

    }

    public function sendPayment($amount)
    {
        echo "<br>Paying via Paybal: ".$amount;
    }
}