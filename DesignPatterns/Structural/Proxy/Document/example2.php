<?php
declare(strict_types=1);
namespace DesignPatterns\Structural\Proxy;
/**
 * Giả sử ta có một hệ thống quản lý tài liệu, chỉ admin mới được phép xóa tài liệu.
 * Trường hợp dùng proxy
 */

class Document{
    public function read(){
        echo "Reading document<br>";
    }
    public function delete(){
        echo "Document deleted !!!<br>";
    }
}
class ProxyDocument{
    private string $role;
    private Document $document;
    public function __construct(string $role)
    {
        $this->role = $role;
        $this->document = new Document();
    }
    public function read(){
        $this->document->read();
    }
    public function delete(){
        if ($this->role != "admin") {
            echo "Access denied !!! Chỉ admin mới được phép xóa<br>";
            return;
        }
        $this->document->delete();
    }
}

// client code
$doc1 = new ProxyDocument("content");
$doc1->read();
$doc1->delete();