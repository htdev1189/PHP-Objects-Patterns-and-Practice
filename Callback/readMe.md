## Callbacks, Anonymous Functions, and Closures

### Callback function
> Callback function trong PHP là một hàm được truyền như tham số cho một hàm khác, và sẽ được gọi thực thi ở bên trong hàm đó. Hiểu đơn giản: bạn đưa tên hàm (hoặc một function ẩn danh) cho một hàm khác xử lý.


#### *** Callback bằng tên hàm
```php
function sayHello($name) {
    echo "Hello, $name!\n";
}

function processUser($callback) {
    $users = ["An", "Bình", "Chi"];
    foreach ($users as $user) {
        // gọi callback
        call_user_func($callback, $user);
    }
}

// Truyền tên hàm vào làm callback
processUser("sayHello");

// Kết quả
Hello, An!
Hello, Bình!
Hello, Chi!

```
### *** Callback bằng function ẩn danh (anonymous function)
```php
function processNumber($callback) {
    for ($i = 1; $i <= 5; $i++) {
        echo $callback($i) . "\n";
    }
}

processNumber(function($n) {
    return $n * $n; // bình phương
});

// kết quả
1
4
9
16
25
```
