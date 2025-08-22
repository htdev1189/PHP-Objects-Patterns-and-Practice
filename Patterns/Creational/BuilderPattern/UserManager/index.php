<?php

/**
 * khi khong dung Builder Pattern
 * vấn đề xảy ra trong trường hợp có quá nhiều params truyền vào __constructor
 *  */
require_once __DIR__ . "/NoPattern.php";
require_once __DIR__ . "/Pattern.php";

use BuilderPattern\no\User;
use BuilderPattern\yes\User as User2; // sử dụng as để tránh xung đột hoặc gọi thẳng namespaces
use BuilderPattern\yes\UserBuilder;

$user = new User(1, "admin", "admin@localhost", "0123456789", "112 Le Tuan Mau", 35);
echo $user->showInfo();


/**
 * Sử dụng Builder Pattern
 * Một ví dụ đơn giản từ Pattern.php
 */

// tạo instance bằng builder
$user2 = (new UserBuilder())
    ->setId(1)
    ->setName("admin")
    ->setEmail("admin@localhost")
    ->setPhone("123456789")
    ->setAddress("112 Le Tuan Mau")
    ->setAge(35)
    ->build();
echo $user2->showInfo();

/**
 * Sử dụng Builder Pattern với đấy đủ cấu trúc
 */

require_once __DIR__ . "/Final.php";

$codeBuider = new \BuilderPattern\full\CodeBuilder;
$derector1 = new \BuilderPattern\full\Director($codeBuider);
$derector1->construct(
    array(
        'id' => 1,
        'name' => "code",
        'email' => "code@localhost"
    ),
    1000
);
$code = $codeBuider->get();
echo $code->showInfo();

$contentBuilder = new \BuilderPattern\full\ContentBuilder;
$derector2 = new \BuilderPattern\full\Director($contentBuilder);
$derector2->construct(
    array(
        'id' => 2,
        'name' => "content",
        'email' => "content@localhost"
    ),
    2000
);
$content = $contentBuilder->get();
echo $content->showInfo();
