## DIP (dependency inversion principle) -- Nguyên tắc đảo ngược sự phự thuộc
### Phát biểu
- Các module cấp cao không nên phụ thuộc trực thuộc trực tiếp vào module cấp thấp
    - lấy ví dụ như class A có hàm khởi tạo, lại khởi tạo 1 propeties của mình ở dạng new Class::name
    - Thay vì đó thì tiêm luôn phụ thuộc vào, phụ thuộc này nên thay thế bằng interface
- Các khai niệm cơ bản
    - **Module cấp cao**: nơi xử lý logic chính (business logic)
    - **Module cấp thấp**: nơi xử lý các chi tiết (như thêm bớt data, lưu trữ DB, vv)
    - **Abstraction**: ở đây có thể là intervafe hoặc abstract class
### Ví dụ
- Không áp dụng DIP
```php
class MySQLDatabase {
    public function save($data) {
        echo "Lưu vào MySQL: $data<br>";
    }
}

class OrderManager {
    private $db;

    public function __construct() {
        $this->db = new MySQLDatabase(); // Phụ thuộc trực tiếp vào chi tiết
    }

    public function saveOrder($order) {
        $this->db->save($order);
    }
}

// Test
$orderManager = new OrderManager();
$orderManager->saveOrder("Đơn hàng #123");

```
