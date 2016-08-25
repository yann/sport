<?php
namespace Home\Controller;
use Think\Controller;
use Think\Model;

class PersonalController extends Controller{
    public function personal()
    {
        $m=new Model();
        $m->query('set names utf8');
        $id=$_SESSION['id'];
        $sql="select * from `sport_player` WHERE id=$id";
        $array=$m->query($sql);
        $this->assign('array',$array);
        //已比赛项目，和未比赛项目
        $string=$array[0]['project'];
        $arr=(explode('/',$string));
        list($one,$two,$three)=$arr;
        $id=$_SESSION['id'];

        //对3个项目进行分别判断，没有写一个函数来处理。one
        $time0=$m->query("select hosttime from `sport_project`WHERE name='$one'");
       if( strtotime($time0[0]['hosttime'])<time())
        {
            //已参赛项目

            $already1=$m->query("select `sport_project`.name,`sport_project`.hosttime,`sport_achievement`.rank, `sport_achievement`.score  from `sport_project`, `sport_achievement` where `sport_project`.name=`sport_achievement`.project AND `sport_project`.name='$one' AND `sport_achievement`.id='$id'");

        }
       else{
           //未比赛项目

           $undo1=$m->query("select `sport_project`.name,`sport_project`.hosttime,`sport_achievement`.rank, `sport_achievement`.score  from `sport_project`, `sport_achievement` where `sport_project`.name=`sport_achievement`.project AND `sport_project`.name='$one' AND `sport_achievement`.id='$id'");
       }
        $time1=$time0[0]['hosttime'];
        $this->time1=$time1;

        ////对3个项目进行分别判断，没有写一个函数来处理。two


        $time0=$m->query("select hosttime from `sport_project`WHERE name='$two'");
        if( strtotime($time0[0]['hosttime'])<time())
        {
            $already2=$m->query("select `sport_project`.name,`sport_project`.hosttime,`sport_achievement`.rank, `sport_achievement`.score  from `sport_project`, `sport_achievement` where `sport_project`.name=`sport_achievement`.project AND `sport_project`.name='$two' AND `sport_achievement`.id='$id'");

        }
    else{
        $undo2=$m->query("select `sport_project`.name,`sport_project`.hosttime,`sport_achievement`.rank, `sport_achievement`.score  from `sport_project`, `sport_achievement` where `sport_project`.name=`sport_achievement`.project AND `sport_project`.name='$two' AND `sport_achievement`.id='$id'");

    }

        $time2=$time0[0]['hosttime'];
        $this->time2=$time2;

        ////对3个项目进行分别判断，没有写一个函数来处理。three

        $time0=$m->query("select hosttime from `sport_project`WHERE name='$three'");
        if( strtotime($time0[0]['hosttime'])<time())
        {
            $already3=$m->query("select `sport_project`.name,`sport_project`.hosttime,`sport_achievement`.rank, `sport_achievement`.score  from `sport_project`, `sport_achievement` where `sport_project`.name=`sport_achievement`.project AND `sport_project`.name='$three' AND `sport_achievement`.id='$id'");

        }
        else{
            $undo3=$m->query("select `sport_project`.name,`sport_project`.hosttime,`sport_achievement`.rank, `sport_achievement`.score  from `sport_project`, `sport_achievement` where `sport_project`.name=`sport_achievement`.project AND `sport_project`.name='$three' AND `sport_achievement`.id='$id'");
        }

//对3个数组already进行分别合并，先判断是否有空数组，
      if($already1==null)
      {
          if($already2==null)
          {
              $already=$already3;
          }
          if($already3==null)
          {
              $already=$already2;
          }
          if($already2==null&&$already3==null)
          {
              $already=null;
          }
      }
        else{
            $already=$already1;
            if($already2!=null)
            {
                $already=array_merge($already,$already2);
            }
            if($already3!=null)
            {
                $already=array_merge($already,$already3);
            }
            if($already2!=null&&$already3!=null)
            {
                $already=array_merge($already,array_merge($already2,$already3));
            }
        }


        //对3个数组undo进行分别合并，先判断是否有空数组，
        if($undo1==null)
        {
            if($undo2==null)
            {
                $undo=$undo3;
            }
            if($undo3==null)
            {
                $undo=$undo2;
            }
            if($undo2==null&&$undo3==null)
            {
                $undo=null;
            }
        }
        else{
            $undo=$undo1;
            if($undo2!=null)
            {
                $undo=array_merge($undo,$undo2);
            }
            if($undo!=null)
            {
                $undo=array_merge($undo,$undo3);
            }
            if($undo2!=null&&$undo3!=null)
            {
                $undo=array_merge($undo,array_merge($undo,undo));
            }
        }
        $this->assign('undo',$undo);
        $this->assign('already',$already);
        $this->display();
    }
}

