<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Model;
class NewsController extends Controller {

    public function news()
    {
        $content = $this->fetch('Header:header');
        $this->show($content);
        $this->display();
    }
        public function getNews()
    {
        $m=new Model();
        $m->query('set names utf8');
        $array=$m->query('select * from `sport_news`');
        echo json_encode($array);
    }
}