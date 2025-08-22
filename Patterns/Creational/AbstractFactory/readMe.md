## Abstract Factory
```php

2. Khái niệm

- Là một Creational Design Pattern (mẫu thiết kế khởi tạo).
- Nó cung cấp giao diện để tạo ra các loại đối tượng liên quan mà không chỉ rõ lớp cụ thể nào sẽ được tạo.

2. Cấu trúc

- Abstract Product: interface cho từng loại sản phẩm.
- Concrete Factory: triển khai abstract Product, tạo ra các sản phẩm cụ thể.
- Abstract Factory: định nghĩa interface cho các factory con.
- Concrete Product: sản phẩm cụ thể do concrete factory tạo ra.
- Client: sử dụng factory để tạo sản phẩm.

👉 Ví dụ: 

    - Bạn có thể tạo UI cho Windows hoặc UI cho MacOS. Các đối tượng trong mỗi hệ điều hành đều có loại riêng (Button, Checkbox, ...).
    - Giả sử bạn viết một hệ thống PHP có thể chạy trên nhiều loại database: MySQL hoặc PostgreSQL. Mỗi DB có cách tạo Connection, QueryBuilder, Record riêng. Nếu code trực tiếp, bạn sẽ phải if...else khắp nơi → rất rối.




```