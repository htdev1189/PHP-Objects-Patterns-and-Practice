<?php
declare(strict_types=1);
namespace App\Implements;
use App\Interface\PaymentMethod;

class PayPalPayment implements PaymentMethod{
    public function pay($amount) : string {
        return "Paid $amount by PayPal";
    }
}