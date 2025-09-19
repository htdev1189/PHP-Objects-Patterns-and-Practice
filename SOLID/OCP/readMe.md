## OCP - Open/Closed Principle
> Nguyên tắc O trong SOLID là Open/Closed Principle — mở để mở rộng (open for extension), đóng để sửa đổi (closed for modification).
Nói ngắn: một module/class nên được thiết kế sao cho khi cần thêm tính năng mới ta có thể mở rộng hành vi (thêm code mới) mà không phải sửa code đã có. Mục tiêu: giảm rủi ro gây lỗi khi thay đổi, tăng khả năng mở rộng và bảo trì.

### vi phạm nguyên tắc
```php
// Vi phạm OCP: mỗi lần thêm phương thức thanh toán mới phải sửa class này.

class PaymentService {
    public function pay($method, $amount) {
        if ($method === 'credit_card') {
            // xử lý thẻ tín dụng
            return $this->payByCreditCard($amount);
        } elseif ($method === 'paypal') {
            // xử lý PayPal
            return $this->payByPayPal($amount);
        } elseif ($method === 'bank_transfer') {
            // xử lý chuyển khoản
            return $this->payByBankTransfer($amount);
        }
        throw new Exception("Unsupported payment method: " . $method);
    }

    protected function payByCreditCard($amount) {
        // code xử lý thẻ
        return "Paid $amount by credit card";
    }
    protected function payByPayPal($amount) {
        // code xử lý paypal
        return "Paid $amount by PayPal";
    }
    protected function payByBankTransfer($amount) {
        // code xử lý chuyển khoản
        return "Paid $amount by bank transfer";
    }
}

// Sử dụng
$service = new PaymentService();
echo $service->pay('paypal', 100); // OK

// => Nếu muốn thêm 'apple_pay', phải sửa PaymentService::pay => vi phạm OCP
```

### Áp dụng OCP
```php 
// Tuân thủ OCP: có interface PaymentMethod, có PaymentProcessor dùng dependency injection.
// Khi cần thêm phương thức mới chỉ tạo class mới implement PaymentMethod.

interface PaymentMethod {
    public function pay($amount);
}

// Các phương thức cụ thể
class CreditCardPayment implements PaymentMethod {
    public function pay($amount) {
        // xử lý thẻ tín dụng
        return "Paid $amount by credit card";
    }
}

class PayPalPayment implements PaymentMethod {
    public function pay($amount) {
        // xử lý PayPal
        return "Paid $amount by PayPal";
    }
}

class BankTransferPayment implements PaymentMethod {
    public function pay($amount) {
        // xử lý chuyển khoản
        return "Paid $amount by bank transfer";
    }
}
class ApplePayment implements PaymentMethod {
    public function pay($amount){
        return "Paid $amount by Apple Payment";
    }
}

// Processor chỉ biết dùng interface, không quan tâm đến chi tiết từng phương thức
class PaymentProcessor {
    protected $method; // một instance của PaymentMethod

    public function __construct(PaymentMethod $method) {
        $this->method = $method;
    }

    public function pay($amount) {
        return $this->method->pay($amount);
    }
}

// Sử dụng
$paypal = new PayPalPayment();
$processor = new PaymentProcessor($paypal);
echo $processor->pay(150); // "Paid 150 by PayPal"

$apple = new ApplePayment();
$processor2 = new PaymentProcessor($apple);
echo $processor2->pay(150); // "Paid 150 by Apple Payment"

// Thêm ApplePay thì chỉ cần tạo class ApplePayPayment implements PaymentMethod
// và không cần sửa PaymentProcessor hay class khác.

```