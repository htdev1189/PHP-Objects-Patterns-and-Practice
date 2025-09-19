<?php
declare(strict_types=1);
namespace App\Implements;
use App\Interface\PaymentMethod;

class BankTransferPayment implements PaymentMethod {
    public function pay($amount) {
        return "Paid $amount by Bank Transfer";
    }
}
