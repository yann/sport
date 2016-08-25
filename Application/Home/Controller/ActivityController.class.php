<?php
namespace Home\Controller;
use Think\Controller;
use Think\Model;
 class ActivityController extends Controller
 {
     public function activity()
     {
        $m=M();
         $m->query('set names utf8');
         $arr=$m->query("select name from `sport_project`");
         $this->assign('arr',$arr);

         $this->display();
     }
     public function join()
     {
         $name=session('name');
         $id=session('id');
         $classid=session('classid');
         $grade=session('grade');
         $academy=session('academy');
         $sex=session('sex');

         /*取出来是一个数组，需要合并为一个字符串*/
         $array =$_POST["project"];
         $project=implode('/',$array);

         $m1=new Model();
         $m1->query('set names utf8');
         $sql1="select count(*) from  `sport_player` WHERE `id`='$id' AND `name`='$name'";
         $find=$m1->query($sql1);
         $find=($find[0]['count(*)']);

        if($find>0)
         {
             $this->error("已经报名过啦");
             exit;
         }

         $sq2="insert into `sport_player`(`id`,`name`,`classid`,`grade`,`academy`,`sex` ,`project`)VALUES ('$id','$name','$classid','$grade','$academy','$sex','$project')";
         $count=$m1->execute($sq2);

    if($count>0)
        {
            $this->success("报名成功！");
        }
         else{

             $this->error("报名失败!");
         }
     }
 }