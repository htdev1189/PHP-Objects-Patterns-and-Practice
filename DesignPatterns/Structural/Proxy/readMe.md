## Proxy Pattern
> Proxy Pattern (mẫu thiết kế Ủy quyền) là một mẫu thiết kế thuộc nhóm Structural. Nó cung cấp một lớp thay thế (proxy) để kiểm soát truy cập đến một đối tượng khác (real object).

> Nói cách khác, Proxy đóng vai trò trung gian giữa client và đối tượng thực sự, giúp ta có thể Chỉ khởi tạo đối tượng thật khi cần thiết, Thêm quyền truy cập, logging, caching… trước khi gọi đến object thật, Tránh tải dữ liệu nặng khi không dùng tới