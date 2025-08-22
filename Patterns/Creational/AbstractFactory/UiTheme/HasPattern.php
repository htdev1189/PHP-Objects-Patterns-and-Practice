<?php 

// them text cho button
class Text{
    protected $text;
}
/**
 * b1: Abstract Product (interface cho từng product -- o day chi co Button, hoặc ví dụ thể có thể như Checkbox vv...)
 */

interface Button{
    public function render();
}

/**
 * b2: Concrete Factory (Triển khai các interface Abstract Product để tạo ra các đối tượng cụ thể)
 */


// hiển thị button trong giao diện dark
class DarkButton extends Text implements Button {
    public function __construct($text)
    {
        $this->text = $text;
    }
    // bắt buộc phải Overriding(ghi đè phương thức -- cùng tên cùng tham số) -- java thì có thêm Overloading (có nghĩa là cùng tên nhưng có thể thêm khác tham số)
    public function render()
    {
        return "<button style='background:black; color:white;border:none;'>" . $this->text . "</button>";
    }
}

// hiển thị button trong giao diện light
class LightButton extends Text implements Button{
    public function __construct($text)
    {
        $this->text = $text;
    }

    // bắt buộc phải Overriding(ghi đè phương thức -- cùng tên cùng tham số) -- java thì có thêm Overloading (có nghĩa là cùng tên nhưng có thể thêm khác tham số)
    public function render()
    {
        return "<button style='background:white; color:black;border:none;'>" . $this->text . "</button>";
    }
}


/**
 * b3: Abstract Factory (định nghĩa interface cho các factory con.)
 */
interface ThemeFactory{
    public function createButton($text);
}


/**
 * b4: Concrete Product: triển khai Abstract Factory và  tạo ra các class cụ thể từ Concrete Factory (ở đây là DankButton và LightButton) 
 */
class DarkThemeFactory implements ThemeFactory{
    public function createButton($text)
    {
        return new DarkButton($text);
    }
}
class LightThemeFactory implements ThemeFactory{
    public function createButton($text)
    {
        return new LightButton($text);
    }
}



