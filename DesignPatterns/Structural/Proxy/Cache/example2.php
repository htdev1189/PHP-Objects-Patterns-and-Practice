<?php 

declare(strict_types=1);
namespace DesignPatterns\Structural\Proxy;

/**
 * Truong hop khong dung proxy
 */
class API{
    public function getAPI(string $link){
        echo "Lấy dữ liệu từ {$link} về <br>";
        return "data for {$link}: some data";
    }
}

class ProxyAPI{
    // tạo 1 mảng hứng các đường dẫn link đã fetch rồi
    private array $cache = [];
    private API $api;

    public function __construct()
    {
        $this->api = new API();
    }
    
    public function getAPI(string $link){
        if (!isset($this->cache[$link])) {
            $this->cache[$link] = $this->api->getAPI($link);
        }else {
            echo "Lấy dữ liệu từ {$link} trong cache <br>";
        }
        return $this->cache[$link];
    }
    public function test(){
        var_dump($this->cache);
    }
}

// client code
$api = new ProxyAPI();
echo $api->getAPI("https://google.com.vn")."<br>";
echo $api->getAPI("https://github.com")."<br>";
echo $api->getAPI("https://google.com.vn")."<br>";
// $api->test();
