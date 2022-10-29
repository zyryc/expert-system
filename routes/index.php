<?php
use app\modules\home\controllers\HomeController;

$router->all('home', function() { 
    
    $home = new HomeController();
    $home->index();
   });
   $router->all('/', function() { 
    
    $home = new HomeController();
    $home->index();
   });