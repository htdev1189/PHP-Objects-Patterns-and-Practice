<?php 
declare(strict_types = 1);
namespace DesignPatterns\Creational\SimpleFactory;

// định nghĩa interface dùng chung
interface PaymentGateway {
    // phương thức thanh toán bắt buộc thực thi từ các class
    public function charge(float $amount);
}