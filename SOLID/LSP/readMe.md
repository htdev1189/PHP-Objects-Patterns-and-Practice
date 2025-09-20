## LSP (Liskov Substitution Principle) 
> LSP nói rằng một lớp dẫn xuất (subclass) phải có thể thay thế hoàn toàn cho lớp cơ sở (base class) mà không làm thay đổi tính đúng đắn của chương trình. Nói cách khác: nếu S là subclass của T thì mọi chỗ dùng T đều phải hoạt động đúng khi truyền S vào.

> Tập trung vào kế thừa, vấn đề tránh là lớp con không thể thay thế lớp cha (này khác với I là nó quan tâm tới interface và vấn đề tránh là class bị ép implement những interface không cần thiết )

```php
class Bird {
    public function fly() {
        // bay lên trời
    }
}

// vi phạm
class Ostrich extends Bird {
    public function fly() {
        throw new Exception("Đà điểu không bay được!");
    }
}

```

> Chú ý 2 khái niệm
```php
// Inheritance -- kế thừa (is -- a) -- dễ vi phạm LSP 
// Composition -- thành phần (has a) -> Tiêm phụ thuộc, giải pháp chống phụ thuộc LSP
```