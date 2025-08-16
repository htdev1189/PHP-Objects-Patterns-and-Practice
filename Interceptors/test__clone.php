<?php 

namespace Intercaptors\cloneTest;

class NhaSanXuat{
    public $name;
    public function __construct($name) {
        $this->name = $name;
    }
}

class SanPham{
    public $title;
    public $nhaSanXuat;

    public function __construct($title, $nhaSX) {
        $this->title = $title;
        $this->nhaSanXuat = $nhaSX;
    }

    // hàm thực thi khi clone
    // public function __clone()
    // {
    //     // tạo bản sao mới cho nhaSanXuat (tránh tình trạng thay đổi sp2 kéo theo sự thay đổi sp1)
    //     $this->nhaSanXuat = clone $this->nhaSanXuat;
    // }
}

