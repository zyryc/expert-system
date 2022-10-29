<?php
namespace app\modules\home\controllers;

use system\Controller; 

class HomeController 

{
    public function __construct()
    {
        
    }
    public function index()
    {
        $data['title'] = 'Home';
        view('home/index', $data);
    }
}