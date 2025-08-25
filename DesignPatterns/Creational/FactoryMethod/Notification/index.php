<?php 
require_once __DIR__ . "/NotificationCreator.php";
// test
function clientCode(NotificationCreator $creator){
    $creator->notify("Bạn có thông báo mới!");
}

clientCode(new EmailNotificationCreator());
clientCode(new SMSNotificationCreator());

// giả sử như muốn thêm 1 kiểu thông báo bên Zalo,
// thì chỉ cần tạo các file liên quan chứ không sửa đổi các class khác
