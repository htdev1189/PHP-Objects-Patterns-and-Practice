<?php
// Interface chung cho Button
// Một interface duy nhất (Button)
interface Button
{
    public function render();
}

// Button cho Windows
class WindowsButton implements Button
{
    public function render()
    {
        echo "Render Windows Button\n";
    }
}

// Button cho Mac
class MacButton implements Button
{
    public function render()
    {
        echo "Render Mac Button\n";
    }
}

// Creator class
abstract class Dialog
{
    // Một lớp trừu tượng có phương thức factory
    abstract public function createButton(): Button;

    public function renderWindow()
    {
        $button = $this->createButton();
        $button->render();
    }
}

// Concrete Creator cho Windows
// Lớp con kế thừa và override phương thức factory
class WindowsDialog extends Dialog
{
    public function createButton(): Button
    {
        return new WindowsButton();
    }
}

// Concrete Creator cho Mac
class MacDialog extends Dialog
{
    public function createButton(): Button
    {
        return new MacButton();
    }
}

// Client code
$dialog = new WindowsDialog();
$dialog->renderWindow(); // Output: Render Windows Button

$dialog = new MacDialog();
$dialog->renderWindow(); // Output: Render Mac Button
