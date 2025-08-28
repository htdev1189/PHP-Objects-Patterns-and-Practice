<?php 
declare(strict_types=1);
namespace DesignPatterns\Structural\Composite;

/**
 * Trường hợp khong dùng composite
 */
class MenuItem{
    public $title;
    public $link;

    public function __construct($title, $link) {
        $this->title = $title;
        $this->link = $link;
    }

    public function render(){
        echo "$this->title  ";
    }
}

class Menu{
    // mang lưu trữ item
    public $listItem = [];

    // add item
    public function addMenu(MenuItem $item){
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
$menu = new Menu();

$menu->addMenu(new MenuItem("menu 1","#"));
$menu->addMenu(new MenuItem("menu 2","#"));


$menu->render();

/**
 * Vấn đề thêm menu vào ok
 * tuy nhiên khi muốn thêm menu con thì không thể, hoặc phải thay đổi cấu trúc class MenuItem thêm level vào
 */