> Autoload trong PHP là cơ chế tự động nạp (load) class, interface, trait khi ta gọi đến chúng mà chưa include hoặc require file chứa code. Điều này giúp code gọn hơn, tránh phải viết hàng loạt require_once ở đầu file.
### Cách hoạt động
- Khi bạn khởi tạo một class, PHP sẽ kiểm tra xem class đó đã được định nghĩa chưa
- Nếu chưa, PHP sẽ gọi đến autoload function để tìm và nạp file định nghĩa class đó
- Bạn chỉ cần khai báo quy tắc ánh xạ giữa tên class và đường dẫn file
### Cách sử dụng
> __autoload (đã cũ)
```php 
function __autoload($classname) {
    include $classname . ".php";
}
$obj = new User(); // PHP sẽ tự tìm User.php để load
```
> spl_autoload_register
```php
spl_autoload_register(function ($classname) {
    include "classes/" . $classname . ".php";
});

$user = new User();  // Tự động load classes/User.php
$product = new Product(); // Tự động load classes/Product.php
```