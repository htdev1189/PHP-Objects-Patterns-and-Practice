<?php 
/**
 * input : loại giao diện (tối hoặc sáng)
 * output : render ra các đối tượng theo loại giao diện 
 */

interface Button{
    public function render();
}
class LightButton implements Button{
    public function render()
    {
        return "<button style='background:white; color:black;border:none;'>Light Button</button>";
    }
}
class DarkButton implements Button{
    public function render()
    {
        return "<button style='background:black; color:white;border:none;'>Dark Button</button>";
    }
}


