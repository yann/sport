<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Model;
class ScheduleController extends Controller {

    public function schedule()
    {
        $content = $this->fetch('Header:header');
        $this->show($content);

        $this->display();
    }
        public function getSchedule()
    {
        $m=new Model();
        $m->query('set names utf8');
        $array=$m->query('select * from `sport_project`');
        echo json_encode($array);
    }

}