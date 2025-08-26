<?php 
declare(strict_types=1);
namespace DesignPatterns\Creational\SimpleFactory;

require_once __DIR__ . "/Gateway.php";
use DesignPatterns\Creational\SimpleFactory\PayPalGateway;
use DesignPatterns\Creational\SimpleFactory\VnpayGateway;

class PaymentGatewayFactory{
    // tạo kiểu giao dịch
    public static function create(string $type){
        return match ($type) {
            'paypal' => new PayPalGateway(),
            'vnpay' => new VnpayGateway(),
            default => throw new \Exception("unsupported payment gateway : {$type}"), // chú ý \ trước khi Exception
        };
    }
}
