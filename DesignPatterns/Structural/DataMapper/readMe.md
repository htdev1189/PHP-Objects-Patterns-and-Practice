## Data Mapper
> Data Mapper là một mẫu thiết kế (design pattern) thuộc nhóm Structural Pattern trong lập trình hướng đối tượng. Mục tiêu chính của nó là tách biệt logic nghiệp vụ (business logic) khỏi logic truy xuất dữ liệu (data access logic). Điều này giúp cho các lớp domain không phụ thuộc vào cơ sở dữ liệu, từ đó dễ dàng kiểm thử, bảo trì và mở rộng.

- Là một lớp trung gian (mapper) giữa domain object và database.
- Nó không chứa logic nghiệp vụ, chỉ chịu trách nhiệm chuyển đổi dữ liệu giữa hai tầng.
