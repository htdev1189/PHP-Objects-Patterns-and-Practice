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
- Vấn đề
    - `OrderManager` phụ thuộc chặt chẽ vào `MySQLDatabase`
    - Giả sử muốn lưu data theo dạng Postgre thì phải ửa code trong `OrderManager`

### Áp dụng DIP
```php
<?php

interface DatabaseInterface {
    public function save($data);
}

class MySQLDatabase implements DatabaseInterface {
    public function save($data) {
        echo "Lưu vào MySQL: $data<br>";
    }
}

class FileDatabase implements DatabaseInterface {
    public function save($data) {
        echo "Lưu vào File: $data<br>";
    }
}

class OrderManager {
    private $db;

    // Tiêm phụ thuộc qua constructor (Dependency Injection)
    public function __construct(DatabaseInterface $db) {
        $this->db = $db;
    }

    public function saveOrder($order) {
        $this->db->save($order);
    }
}

// Test
$orderManager = new OrderManager(new MySQLDatabase());
$orderManager->saveOrder("Đơn hàng #123");

// Đổi sang File mà không sửa OrderManager
$orderManagerFile = new OrderManager(new FileDatabase());
$orderManagerFile->saveOrder("Đơn hàng #124");

```
- Uu điểm
    - `OrderManager` chỉ phụ thuộc vào abstraction `DatabaseInterface`, không quan tâm nó là MySQL, File hay API.
    - Dễ mở rộng (chỉ cần tạo class mới implement `DatabaseInterface`).