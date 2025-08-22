## Builder pattern
> Khái niệm
- Builder Pattern là một trong các Creational Design Pattern (mẫu thiết kế khởi tạo).
- Nó được dùng khi bạn muốn tạo ra một đối tượng phức tạp có nhiều thuộc tính tùy chọn (optional), mà không muốn viết constructor quá dài hoặc phải tạo nhiều constructor overload.
> Ý tưởng chính
- Có một class Builder chịu trách nhiệm xây dựng từng phần của đối tượng
- Sau đó gọi build() hoặc getResult() để trả về đối tượng hoàn chỉnh.
> Cấu trúc
- **Product** : đối tượng phức tạp cần được xây dựng.
- **Builder** : interface/abstract class định nghĩa các bước xây dựng.
- **ConcreteBuilder** : triển khai Builder để xây dựng sản phẩm cụ thể.
- **Director (tùy chọn)** : điều phối quá trình xây dựng.