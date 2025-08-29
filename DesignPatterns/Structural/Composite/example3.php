<?php

/**
 * Composite là một trong những pattern cực kỳ hữu ích trong lập trình hướng đối tượng, 
 * đặc biệt khi bạn muốn xử lý cấu trúc phân cấp như cây thư mục, menu, hoặc các thành phần UI.
 */

declare(strict_types=1);

namespace DesignPatterns\Structural\Composite3;

/**
 * Bài toán menu
 */

// Component: Interface hoặc abstract class định nghĩa các phương thức chung.

interface MenuComponent
{
    public function render();
}

// Leaf: Đối tượng đơn lẻ, không có con.
class MenuItem implements MenuComponent
{
    public $title;
    public function __construct(string $title)
    {
        $this->title = $title;
    }
    public function render($level=0)
    {
        echo str_repeat("&nbsp;&nbsp;", $level) . "- " . $this->title . "<br>";
        // echo "- " . $this->title . "</br>";
    }
}

// Composite: Đối tượng chứa các thành phần con (leaf hoặc composite khác).
class Menu implements MenuComponent
{
    public $title;
    public $children = [];
    public function __construct(string $title)
    {
        $this->title = $title;
    }
    // add item
    public function add($item)
    {
        $this->children[] = $item;
    }

    public function render($level = 0)
    {
        // echo $this->title . "</br>";
        echo str_repeat("&nbsp;&nbsp;", $level) . "- " . $this->title . "<br>";
        foreach ($this->children as $menuItem) {
            $menuItem->render($level + 1);
        }
    }
}

// test
$mainMenu = new Menu("Main Menu");
$mainMenu->add(new MenuItem("Home"));
$mainMenu->add(new MenuItem("About"));

// category
$categoryMenu = new Menu("Category");
$categoryMenu->add(new MenuItem("Sub 1"));
$categoryMenu->add(new MenuItem("Sub 2"));

$subMenu = new Menu("Services");
$subMenu->add(new MenuItem("Web Design"));
$subMenu->add(new MenuItem("SEO"));
$subMenu->add($categoryMenu);

$mainMenu->add($subMenu);

var_dump($mainMenu->children[2]);
$mainMenu->render();
