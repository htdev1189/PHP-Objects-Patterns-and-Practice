> Sử dụng autoload để không phải require

> Trong thư mục hiện tại khởi tạo Composer
- composer init

> Cấu trúc
autoload/
│
├── src/
│   ├── Database/Database.php
│   ├── Builder/QueryBuilder.php
│   ├── Domain/User.php
│   └── Mapper/UserMapper.php
│
├── vendor/              ← Composer sẽ tạo
├── composer.json        ← Tập tin cấu hình
└── index.php            ← Điểm khởi chạy

> Khai báo autoload trong composer.json
```json
"autoload": {
    "psr-4": {
        "App\\": "src/"
    }
}
```
> Tạo file autoload.php
```code
composer dump-autoload
```


