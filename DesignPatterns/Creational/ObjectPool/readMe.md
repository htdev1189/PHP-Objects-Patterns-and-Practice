## Object Pool Pattern
> Ý tưởng chính
- Tạo một "bể chứa" (pool) các đối tượng đã được khởi tạo sẵn, và tái sử dụng chúng khi cần thay vì tạo mới.
> Lợi ích
- Giảm chi phí khởi tạo đối tượng (ví dụ: kết nối CSDL, socket, xử lý ảnh…)
- Tăng hiệu suất hệ thống trong các ứng dụng có tần suất sử dụng đối tượng cao.
> Khuyến nghị
- Khi việc khởi tạo đối tượng tốn thời gian hoặc tài nguyên.
- Khi có nhiều yêu cầu sử dụng đối tượng giống nhau trong thời gian ngắn.
- Khi số lượng đối tượng hoạt động đồng thời là giới hạn.
