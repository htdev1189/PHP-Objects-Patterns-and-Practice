<?php
class Template
{
    private $sections = [];
    private $currentSection = null;
    private $layout = null;
    private $data = [];   // ✅ giữ lại dữ liệu

    public function render($view, $data = [])
    {
        $this->data = $data; 

        ob_start();
        $this->includeView($view, $this->data);
        $content = ob_get_clean();

        if ($this->layout) {
            ob_start();

            $this->includeView($this->layout,  $this->data);
            return ob_get_clean();
        }

        return $content;
    }

    public function extend($layout)
    {
        $this->layout = $layout;
    }

    public function section($name)
    {
        $this->currentSection = $name;
        ob_start();
    }

    public function endSection()
    {
        $this->sections[$this->currentSection] = ob_get_clean();
        $this->currentSection = null;
    }

    public function yield($name)
    {
        echo $this->sections[$name] ?? '';
    }

    private function includeView($view, $data = [])
    {
        $path = realpath(__DIR__ . "/../views/{$view}.php");
        if (!$path || !file_exists($path)) {
            throw new Exception("View '$view' không tồn tại tại: $path");
        }
        extract($data);   // ✅ luôn giải nén dữ liệu trước khi include
        include $path;
    }
}
