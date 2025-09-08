<?php
declare(strict_types=1);
namespace DesignPatterns\Structural\Proxy;
/**
 * Giả sử ta có một hệ thống quản lý tài liệu, chỉ admin mới được phép xóa tài liệu.
 * Trường hợp không dùng proxy
 * Document vừa xử lý logic nghiệp vụ, vừa làm nhiệm vụ phân quyền (vi phạm nguyên tắc SOLID)
 */

class Document{
    public function read(){
        echo "Reading document<br>";
    }
    public function delete(string $role){
        if($role != "admin"){
            echo "Access denied !!! Chỉ admin mới được phép xóa<br>";
            return;
        }
        echo "Document deleted !!!<br>";
    }
}

// client code
$doc1 = new Document();
$doc1->read();
$doc1->delete("admin");
$doc1->delete("content");