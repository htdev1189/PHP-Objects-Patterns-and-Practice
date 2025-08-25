<?php 
require_once __DIR__ . "/NotificationCreator.php";
require_once __DIR__ . "/SMSNotification.php";
// Lớp con cụ thể (kế thừa và override phương thức factory)
class SMSNotificationCreator extends NotificationCreator {
    public function createNotification(){
        return new SMSNotification();
    }
}