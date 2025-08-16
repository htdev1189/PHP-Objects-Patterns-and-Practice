> Khi dự án lớn lên, bạn có thể có nhiều class/function trùng tên. Namespace cho phép gom nhóm chúng vào “không gian tên” riêng, giống như việc bạn có hai folder khác nhau trong máy tính có thể chứa hai file trùng tên mà không gây lỗi.

> Ví dụ
- Bạn viết class User trong dự án của mình.
- Thư viện ngoài bạn dùng cũng có class User.
- Nếu không có namespace → PHP báo lỗi trùng tên class
- Nếu có namespace → hai class User này thuộc 2 namespace khác nhau nên không xung đột.