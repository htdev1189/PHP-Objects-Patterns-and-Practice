<?php

/**
 * Xây dựng một hệ thống có các loại nhân viên khác nhau:
 * Lập trình viên, Thiết kế, và Thực tập sinh. 
 * Mỗi loại nhân viên có những khả năng khác nhau như làm việc, ăn trưa, hoặc tham gia đào tạo.
 */

// Tạo các interface nhỏ, đúng chức năng
interface Workable {
    public function work();
}

interface Eatable {
    public function eat();
}

interface Trainable {
    public function attendTraining();
}

// Tạo các class nhân viên phù hợp
class Developer implements Workable, Eatable {
    public function work() {
        echo "Developer is coding...\n";
    }

    public function eat() {
        echo "Developer is eating lunch...\n";
    }
}

class Designer implements Workable, Eatable {
    public function work() {
        echo "Designer is designing UI...\n";
    }

    public function eat() {
        echo "Designer is eating lunch...\n";
    }
}

class Intern implements Workable, Trainable {
    public function work() {
        echo "Intern is helping with tasks...\n";
    }

    public function attendTraining() {
        echo "Intern is attending training session...\n";
    }
}

// client code
$staff = [
    new Developer(),
    new Designer(),
    new Intern()
];

foreach ($staff as $person) {
    $person->work();

    if ($person instanceof Eatable) {
        $person->eat();
    }

    if ($person instanceof Trainable) {
        $person->attendTraining();
    }

    echo "\n";
}





