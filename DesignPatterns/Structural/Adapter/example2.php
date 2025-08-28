<?php
declare(strict_types=1);
namespace DesignPatterns\Structural\Adapter;

/**
 * Kết hợp Adapter và Factory
 * 
 */

// interface chuẩn thanh toán
interface PaymentInterface{
    public function pay($amount);
}

// Các dịch vụ thanh toán gốc
class MoMoPayment {
    public function sendMoney($amount) {
        echo "Thanh toán $amount qua MoMo<br>";
    }
}

class PayPalPayment {
    public function makeTransaction($amount) {
        echo "Thanh toán $amount qua PayPal<br>";
    }
}


// Các Adapter
class MoMoAdapter implements PaymentInterface {
    private $momo;

    public function __construct(MoMoPayment $momo) {
        $this->momo = $momo;
    }

    public function pay($amount) {
        $this->momo->sendMoney($amount);
    }
}

class PayPalAdapter implements PaymentInterface {
    private $paypal;

    public function __construct(PayPalPayment $paypal) {
        $this->paypal = $paypal;
    }

    public function pay($amount) {
        $this->paypal->makeTransaction($amount);
    }
}

// Factory để chọn adapter theo tên dịch vụ
class PaymentFactory{
    // tao phuong thuc thanh toan
    public static function create($provider){
        return match ($provider) {
            "momo" => new MoMoAdapter(new MoMoPayment),
            "paypal" => new PayPalAdapter(new PayPalPayment),
            default => throw new \Exception("Provider not support"),
        };
    }
}

// client code
function processPayment(string $provider, $amount){
    try {
        // lấy phương thức thanh toán
        $payment = PaymentFactory::create($provider);
        $payment->pay(100);
    } catch (\Exception $e) {
        echo $e->getMessage() . "<br>";
    }
}

// run test
processPayment("momo", 100);
processPayment("mômp", 100);
processPayment("paypal", 100);