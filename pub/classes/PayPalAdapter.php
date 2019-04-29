<?php


class PayPalAdapter implements PaymentInterface
{
    private $paypal;

    public function __construct()
    {
        $this->paypal = new Paypal();
    }

    public function pay($amount)
    {
        $this->paypal->sendPayment($amount);
    }
}