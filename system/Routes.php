<?php
namespace system;

class Routes{
    public function __construct()
    {
  $router = new \Bramus\Router\Router();
  
  require_once 'routes/index.php';
  
  $router->run();
    }
    public function parseUrl()
    {
        if(isset($_GET['url'])){
            return $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
    }
}