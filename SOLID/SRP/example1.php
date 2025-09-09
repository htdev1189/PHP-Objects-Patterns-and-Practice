<?php 
declare(strict_types=1);
namespace Solid;

/**
 * User : chỉ quản lý thông tin của người dùng như name, email, 
 * UserRepository : chỉ quản lý việc lưu trữ người dùng vào database
 * EmailNotifier : chỉ quản lý việc gửi mail
 */
class User{
    public function __construct(private string $name, private string $email)
    {
        
    }
    public function getName(){
        return $this->name;
    }
    public function getEmail(){
        return $this->email;
    }
}

class UserRepository{
    public function save(User $user){
        echo "Saving user with name : {$user->getName()}<br>";
    }
}

class EmailNotifier{
    public function send(User $user, string $msg){
        echo "Sending email to {$user->getEmail()} with msg: {$msg}<br>";
    }
}

// client code
$user = new User("admin", "admin@localhost");
$repo = new UserRepository();
$repo->save($user);
$notify = new EmailNotifier();
$notify->send($user,"hallo");

