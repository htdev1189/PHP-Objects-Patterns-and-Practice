<?php 
require_once __DIR__ . "/SimpleFactory.php";
use DesignPatterns\Creational\SimpleFactory\PaymentGatewayFactory;

// client code
try {
    // ẩn logic khởi tạo đối tượng khỏi client
    $gateWay = PaymentGatewayFactory::create("vnpvay");
    $gateWay->charge(100.25);
} catch (\Exception $e) { // chú ý ký tự \ -- root
    echo $e->getMessage();
}
