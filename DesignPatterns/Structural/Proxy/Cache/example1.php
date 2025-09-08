<?php 

declare(strict_types=1);
namespace DesignPatterns\Structural\Proxy;

/**
 * Truong hop khong dung proxy
 */
class API{
    public function getAPI(string $link){
        echo "Lấy dữ liệu từ {$link} về <br>";
    }
}

// client code
$api = new API();
$api->getAPI("https://google.com"); //  lấy lần đầu tiên
$api->getAPI("https://google.com"); // lấy lần thứ 2