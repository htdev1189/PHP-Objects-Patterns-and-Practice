<?php 
/**
 * Giả sử bạn đang xây dựng một hệ thống thanh toán. 
 * Hệ thống của bạn sử dụng một interface PaymentInterface, 
 * nhưng bạn muốn tích hợp một thư viện bên ngoài có lớp ThirdPartyPayment với phương thức makeTransaction()
 * <không tương thích với interface của bạn>
 */
declare(strict_types=1);

// interface mà hệ thống bạn đang sử dụng
interface PaymentInterface{
    public function pay($amount);
}

// lớp của bên thứ 3 cung cấp
class ThridPartyPayment{
    public function makeTransition($value){
        echo "Thanh toán {$value}$ qua hệ thống thứ 3";
    }
}

// Adapter giúp kết nối giữa 2 phương thức thanh toán
class PaymentAdapter implements PaymentInterface{
    private $thirdParty;

    // tiêm bên thứ 3 vào
    public function __construct(ThridPartyPayment $thridParty)
    {
        $this->thirdParty = $thridParty;
    }
    public function pay($amount)
    {
        // gọi phương thức của bên thứ 3 vào đây, nên phải có 1 propetie của bên thứ 3
        $this->thirdParty->makeTransition($amount);
    }
}

// client code
function processPayment(PaymentInterface $payment, $amount){
    $payment->pay($amount);
}

// cach su dung
$thridParty = new ThridPartyPayment();
$adapter = new PaymentAdapter($thridParty);
processPayment($adapter,100);


