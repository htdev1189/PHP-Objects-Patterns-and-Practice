<?php
declare(strict_types=1);
namespace PHP\Trait;

/**
 * Trường hợp 2 trait trùng method
 */
trait SMS
{
    public function notify($message)
    {
        echo "Sending SMS: $message\n";
    }
}

trait Email
{
    public function notify($message)
    {
        echo "Sending Email: $message\n";
    }
}
trait Push
{
    public function notify($message)
    {
        echo "Sending Push Notification: $message\n";
    }
}

class Notification
{

    // use SMS, Email; // lỗi
    use SMS, Email, Push {
        // Ưu tiên dùng method notify từ trait SMS
        // Nếu như nhiều hơn 2 trait có method trùng tên thì phải khai báo ưu tiên
        SMS::notify insteadOf Email, Push;
        // SMS::notify insteadof Email; 
        Email::notify as notifyEmail; // Đổi tên method notify từ trait Email thành notifyEmail
        Push::notify as notifyPush; // Đổi tên method notify từ trait Push thành notifyPush
    }
    

    public function sendNotification($message)
    {
        $this->notify($message); // Gọi method notify từ trait SMS
        $this->notifyEmail($message); // Gọi method notify từ trait Email
        $this->notifyPush($message); // Gọi method notify từ trait Push
    }
}