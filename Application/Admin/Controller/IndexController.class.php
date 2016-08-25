<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
    
    public function index()
    {
        $content = $this->fetch('Header:header');
        $this->show($content);
         $this->display();
    }
}