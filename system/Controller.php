<?php
namespace system\core;

use system\core\View;
// use system\core\Controller;
// use system\core\Core;


trait Controller
{
    public function view($view, $data = [])
    {
        $view = new View();
        $view->view($view, $data);
    }
}

echo 'Controller.php';