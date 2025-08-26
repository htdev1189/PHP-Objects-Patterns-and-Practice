## Prototype Pattern
> Prototype Pattern cho phép bạn sao chép (clone) một đối tượng hiện có thay vì tạo mới từ đầu. Trong PHP, điều này thường được thực hiện thông qua phương thức __clone(). -- Thay vì dùng new

> Khi nào nên dùng Prototype
- Khi việc khởi tạo đối tượng phức tạp hoặc tốn kém
- Khi bạn cần nhiều bản sao của một đối tượng với cấu hình tương tự
- Khi bạn muốn tránh phụ thuộc vào lớp cụ thể để tạo đối tượng