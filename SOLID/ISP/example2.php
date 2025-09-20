<?php

/**
 * Một số phương thức hỗ trợ refund (hoàn tiền), 
 * nhưng một số thì không (COD không hỗ trợ hoàn tiền tự động).
 */
echo "=== VI PHẠM ISP TRONG THANH TOÁN ===\n";

interface PaymentGateway {
    public function pay(float $amount);
    public function refund(float $amount);
}

class CreditCardPayment implements PaymentGateway {
    public function pay(float $amount) {
        echo "Thanh toán $amount bằng thẻ tín dụng\n";
    }
    public function refund(float $amount) {
        echo "Hoàn tiền $amount về thẻ tín dụng\n";
    }
}

class CODPayment implements PaymentGateway {
    public function pay(float $amount) {
        echo "Khách sẽ thanh toán $amount khi nhận hàng\n";
    }
    public function refund(float $amount) {
        // COD không hỗ trợ hoàn tiền tự động → buộc phải implement!
        throw new BadMethodCallException("COD không hỗ trợ hoàn tiền tự động");
    }
}

// Client gọi refund() mà không kiểm tra → lỗi runtime
try {
    $payment = new CODPayment();
    $payment->pay(100);
    $payment->refund(50); // Crash ở runtime
} catch (BadMethodCallException $e) {
    echo "Lỗi: " . $e->getMessage() . "\n";
}

echo "\n=== TUÂN THỦ ISP ===\n";

interface PaymentInterface {
    public function pay(float $amount);
}

interface RefundablePaymentInterface extends PaymentInterface {
    public function refund(float $amount);
}

class CreditCardPayment2 implements RefundablePaymentInterface {
    public function pay(float $amount) {
        echo "Thanh toán $amount bằng thẻ tín dụng\n";
    }
    public function refund(float $amount) {
        echo "Hoàn tiền $amount về thẻ tín dụng\n";
    }
}

class CODPayment2 implements PaymentInterface {
    public function pay(float $amount) {
        echo "Thanh toán $amount khi nhận hàng\n";
    }
}

// Client chỉ gọi refund() khi chắc chắn class hỗ trợ
function processRefund(RefundablePaymentInterface $gateway, float $amount) {
    $gateway->refund($amount);
}

$cc = new CreditCardPayment2();
$cc->pay(100);
processRefund($cc, 50); // OK, vì chắc chắn hỗ trợ refund

$cod = new CODPayment2();
$cod->pay(100);
// processRefund($cod, 50); // Lỗi compile-time nếu uncomment

