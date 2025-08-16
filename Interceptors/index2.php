<?php

require_once __DIR__ . "/test__clone.php";
use Intercaptors\cloneTest\NhaSanXuat;
use Intercaptors\cloneTest\SanPham;

$nsx1 = new NhaSanXuat("Dell");
$sp1 = new SanPham("vostro", $nsx1);
echo "sp1 truoc khi clone : " . $sp1->nhaSanXuat->name . "<br>";

// clone
$sp2 = clone $sp1;
$sp2->nhaSanXuat->name = "Sony";
echo "sp2 : " . $sp2->nhaSanXuat->name . "<br>";
echo "sp1 sau khi clone : ". $sp1->nhaSanXuat->name . "<br>";
/**
 * nếu không có __clone thì nó sp1 sau khi clone sẽ thay đổi theo sp2 đó là Sony
 * property nhaSanXuat của biến sp1 đã bị thay đổi theo sp2
 * Vì $sp1->nhaSanXuat và $sp2->nhaSanXuat là cùng một object,
 * nên khi bạn đổi tên trong $sp2, thì $sp1 cũng thay đổi theo.
 * nên muốn sp1 không thay đổi khi thay đổi sp2 thì phải tạo 1 object mới cho nhaSanXuat
 * 
 */