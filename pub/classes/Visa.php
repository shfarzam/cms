<?php


class Visa
{
    public function __construct()
    {

    }

    public function sendPayment($amount)
    {
        echo "<br>Paying via Visa: ".$amount;
    }
}