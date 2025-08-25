<?php 
require_once __DIR__ . "/EmailNotificationCreator.php";
require_once __DIR__ . "/SMSNotificationCreator.php";

// Factory Method
abstract class NotificationCreator {
    abstract public function createNotification();

    public function notify(string $message){
        $notification = $this->createNotification();
        $notification->send($message);
    }
}
