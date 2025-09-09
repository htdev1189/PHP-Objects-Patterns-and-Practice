## SOLID
> SOLID là một tập hợp 5 nguyên tắc thiết kế phần mềm trong lập trình hướng đối tượng, được đề xuất bởi Robert C. Martin (Uncle Bob). Mục tiêu của SOLID là giúp mã nguồn dễ bảo trì, mở rộng và tránh các lỗi thiết kế phổ biến.

### 1. Single Responsibility Principle (SRP) – Nguyên tắc trách nhiệm duy nhất
> Mỗi class chỉ nên đảm nhận một trách nhiệm duy nhất.

```php
class UserData {
    public function getUserFromDatabase($id) {
        // Truy vấn dữ liệu người dùng
    }
}

class UserLogin {
    public function login($username, $password) {
        // Xử lý đăng nhập
    }
}

```
### 2. Open/Closed Principle (OCP) – Nguyên tắc đóng/mở
> Class nên mở rộng được mà không cần sửa đổi bên trong
```php
/**
 * Bạn có thể thêm phương thức thanh toán mới mà không cần sửa class hiện tại.
*/
interface PaymentMethod {
    public function pay($amount);
}

class PaypalPayment implements PaymentMethod {
    public function pay($amount) {
        echo "Thanh toán qua PayPal: $amount";
    }
}

class CreditCardPayment implements PaymentMethod {
    public function pay($amount) {
        echo "Thanh toán qua thẻ tín dụng: $amount";
    }
}

```
### 3. Liskov Substitution Principle (LSP) – Nguyên tắc thay thế Liskov
> Class con có thể thay thế class cha mà không làm thay đổi hành vi chương trình
```php
class Bird {
    public function fly() {
        echo "Bay lên trời!";
    }
}

class Sparrow extends Bird {}

/**
 * Vi phạm LSP vì Ostrich không thể thay thế Bird một cách hợp lý. Nên tách Bird thành interface Flyable.
*/
class Ostrich extends Bird {
    public function fly() {
        throw new Exception("Đà điểu không thể bay!");
    }
}
```
### 4. interface segregation principle(isp) - nguyên tắc phân tách interface
> không nên ép class phải implement những phương thức không cần thiết
```php
/**
 * Tách interface giúp Robot không phải implement phương thức eat.
*/
interface Workable {
    public function work();
}

interface Feedable {
    public function eat();
}

class Human implements Workable, Feedable {
    public function work() { echo "Làm việc"; }
    public function eat() { echo "Ăn uống"; }
}

class Robot implements Workable {
    public function work() { echo "Làm việc không ngừng nghỉ"; }
}

```
### 5. Dependency Inversion Principle (DIP) – Nguyên tắc đảo ngược phụ thuộc
> Class nên phụ thuộc vào abstraction (interface), không phụ thuộc vào implementation cụ thể.
```php
interface Logger {
    public function log($message);
}

class FileLogger implements Logger {
    public function log($message) {
        file_put_contents('log.txt', $message);
    }
}

class App {
    private $logger;
    /**
     * App không phụ thuộc vào FileLogger, mà vào Logger abstraction.
    */
    public function __construct(Logger $logger) {
        $this->logger = $logger;
    }

    public function run() {
        $this->logger->log("Ứng dụng đang chạy");
    }
}
```