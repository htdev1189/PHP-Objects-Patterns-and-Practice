<?php 
require_once __DIR__ . "/Notification.php";

// Lớp cụ thể xử lý gửi Email
class SMSNotification implements Notification{
    public function send($msg)
    {
        echo "Gui SMS: $msg </br>";
    }
}