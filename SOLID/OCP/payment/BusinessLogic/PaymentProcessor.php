<?php
declare(strict_types=1);
namespace App\BusinessLogic;
use App\Interface\PaymentMethod;

class PaymentProcessor{
    private $paymentMethod;

    // tiem interfacce
    public function __construct(PaymentMethod $paymentMethod)
    {
        $this->paymentMethod = $paymentMethod;
    }

    // process
    public function process($amount){
       return $this->paymentMethod->pay($amount);
    }
}