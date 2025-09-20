## ISP (Interface Segregation Principle)

> Nguyên tắc cơ bản : mỗi class không nên implement những phương thức mà nó không sử dụng
```php 
// vi pham
interface WorkerInterface {
    public function work();
    public function eat();
}

class Robot implements WorkerInterface {
    public function work() {
        // Robot làm việc
    }

    public function eat() {
        // Robot không ăn → phương thức này không phù hợp
    }
}
```
```php

// fix
interface Workable {
    public function work();
}

interface Eatable {
    public function eat();
}

class Human implements Workable, Eatable {
    public function work() {
        // Con người làm việc
    }

    public function eat() {
        // Con người ăn
    }
}

class Robot implements Workable {
    public function work() {
        // Robot làm việc
    }
}

```