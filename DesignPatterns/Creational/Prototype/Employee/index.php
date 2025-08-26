<?php 
require_once __DIR__ . "/Employee.php";

use DesignPatterns\Creational\Prototype\Department;
use DesignPatterns\Creational\Prototype\Employee;

// client code

// originalEmployee
$originalEmployee = new Employee("Anonymous",30,10.5,new Department("IT", "5 Floor"));
echo $originalEmployee;

// copiedEmployee
$copiedEmployee = clone $originalEmployee;
$copiedEmployee->name = "New Name";

// su dung khi đã thiết lập __clone
$copiedEmployee->department->name = "SEO";
$copiedEmployee->department->location = "4 Floor";

// $copiedEmployee->department = new Department("SEO","4 Floor");
echo $copiedEmployee;
echo $originalEmployee;

/**
 * Vấn đề xảy ra nếu như không thiết lập __clone trong khởi tạo của lớp Emplyee
 * giả sử như bạn không thiết lập department bằng 1 đối tượng mới mà chỉ sửa 
 * ví dụ như $copiedEmployee->department->name = "SEO"
 * Lúc này cả 2 instace originalEmployee và copiedEmployee đều trỏ về 1 vùng nhớ
 * nên dẫn tới originalEmployee sẽ thay đổi theo sự thay đổi của copiedEmployee
 * Cách xử lý trường hợp này là trong hàm khởi tạo của Employee mình phải clone cái department ra
 */