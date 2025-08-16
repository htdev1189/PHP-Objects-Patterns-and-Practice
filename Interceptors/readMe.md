# magic method

## __get
> được gọi tự động khi bạn truy cập một thuộc tính không tồn tại hoặc không thể truy cập trực tiếp (private/protected) của đối tượng.

## __set
> Được gọi tự động khi bạn gán giá trị cho một thuộc tính không tồn tại hoặc không truy cập được (private/protected) của đối tượng.

## __call
> được gọi khi bạn cố gắng gọi một phương thức không tồn tại hoặc không thể truy cập được (private/protected) trong một object. Hoặc là gọi 1 method của lớp khác mà ko cần khai báo trong class nội tại

## __clone
> được gọi khi bạn nhân bản (clone) một object bằng từ khóa clone. Mặc định khi clone một object, PHP sẽ tạo một bản sao nông (shallow copy), Các thuộc tính dạng kiểu dữ liệu cơ bản (int, string, bool, float) được sao chép giá trị, Các thuộc tính là object sẽ chỉ sao chép tham chiếu, tức là cả object gốc và bản clone sẽ trỏ tới cùng object con.
> Vì vậy, nếu bạn muốn deep copy (sao chép toàn bộ, bao gồm cả các object con), bạn sẽ cần định nghĩa hàm __clone()
