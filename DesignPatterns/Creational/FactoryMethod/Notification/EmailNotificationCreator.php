<?php 
require_once __DIR__ . "/NotificationCreator.php";
require_once __DIR__ . "/EmailNotification.php";
// Lớp con cụ thể (kế thừa và override phương thức factory)
class EmailNotificationCreator extends NotificationCreator {
    public function createNotification(){
        return new EmailNotification();
    }
}