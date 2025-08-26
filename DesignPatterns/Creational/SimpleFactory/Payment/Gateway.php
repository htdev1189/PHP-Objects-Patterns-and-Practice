<?php 
declare(strict_types=1);
namespace DesignPatterns\Creational\SimpleFactory;

require_once __DIR__ . "/PaymentGateway.php";
use DesignPatterns\Creational\SimpleFactory\PaymentGateway;
// triển khai interface thông qua các phương thức giao dịch

// giao dịch bằng PayPal
class PayPalGateway implements PaymentGateway{
    public function charge(float $amount){
        echo "charge {$amount} via PayPal";
    }
}

// giao dich bang Vnpay
class VnpayGateway implements PaymentGateway{
    public function charge(float $amount){
        echo "charge {$amount} via Vnpay";
    }
}