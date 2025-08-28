<?php 
declare(strict_types=1);
namespace DesignPatterns\Structural\Composite2;

/**
 * Trường hợp khong dùng composite
 */
class MenuItem{
    public $title;
    public $link;
    public $subItems = [];

    public function __construct($title, $link="#") {
        $this->title = $title;
        $this->link = $link;
    }

    // add sub to items
    public function addSubItem($item){
        $this->subItems[] = $item;
    }

    public function render($level = 0){
        // cách này ko dùng duoc do trình duyệt tự động chueyern vè 1 khoảng trắng duy nhất
        // echo str_repeat("  ", $level) . "- " . $this->title . "<br>";


        echo str_repeat("&nbsp;&nbsp;", $level) . "- " . $this->title . "<br>";
        // đệ quy
        foreach ($this->subItems as $subItem) {
            $subItem->render($level + 1);            
        }
    }
}

class Menu{
    // mang lưu trữ item
    public $listItem = [];

    // add item
    public function addItem(MenuItem $item){
        $this->listItem[] = $item;
    }

    // render
    public function render(){
        foreach ($this->listItem as $item) {
            $item->render();
        }
    }
}

// code test
$home = new MenuItem("Home");
$about = new MenuItem("About");

$services = new MenuItem("Services");
$webDesign = new MenuItem("Web Design");
$seo = new MenuItem("SEO");

$services->addSubItem($webDesign);
$services->addSubItem($seo);

$mainMenu = new Menu();
$mainMenu->addItem($home);
$mainMenu->addItem($about);
$mainMenu->addItem($services);

$mainMenu->render();


/**
 * Vấn đề thêm menu vào ok
 * tuy nhiên khi muốn thêm menu con thì không thể, hoặc phải thay đổi cấu trúc class MenuItem thêm level vào
 */