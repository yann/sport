<?php
namespace Home\Controller;
use Think\Controller;
use Think\Model;

class RegisterController extends  Controller{
     public  function register()
     {
         $this->display();
     }
//处理注册事件
    public function do_register()
    {

        //验证验证码
        $Verify = new \Think\Verify();
        if(!$Verify->check($_POST['reverify'],'re'))
        {
            $this->error('验证码错误');
        }

        $id = $_POST['inputStuNum'];
        $name = $_POST['inputStuName'];
        $password = $_POST['inputPassword'];
        $classid=$_POST['inputStuClass'];
        $grade=$_POST['inputGrade'];
        $academy = $_POST['inputCollege'];
        $sex = $_POST['optionsRadio'];

      /*  //thinkphp对数据的插入操作
      $m = M('user');
       $date = array(
            'id' => $id,
            'name' => $name,
            'password' => $password,
            'academy' => $academy,
            'sex' => $sex,
        );
        $count = $m->add($date);*/
        $m=new Model();
        $m->query("SET NAMES 'utf8'");
        $sql="INSERT INTO `sport_user`(`id`, `name`, `password`, `classid`,`grade`, `academy`, `sex`) VALUES ('$id','$name','$password','$classid','$grade','$academy','$sex')";
        $count=$m->execute($sql);
       if ($count)
        {
            $this->success('注册成功', U('Login/login'),2);
            exit;
        } else
        {
            $this->error("注册失败！");
        }
    }
    /*传递所有学院*/
    public function ajaxAcademy()
    {
        $m=new Model();
        $m->query('set names utf8');
        $sql="select name from sport_academy ";
        $arr=$m->query($sql);
        $this->ajaxReturn($arr);
    }
    /*传递学号，检测是否已存在*/
    public function ajaxNum()
    {
        $id=$_POST['StuNum'];
        $m=M('user');
        $where['id']=$id;
        $count=$m->where($where)->find();
        if($count>0)
        {
            $this->ajaxReturn("already");
        }
        else{
            $this->ajaxReturn("ok");
        }
    }

    public function verify()
    {
        $Verify = new \Think\Verify();
        $Verify->fontSize = 20;
        $Verify->length   = 4;
        $Verify->useNoise = false;
        $Verify->entry('re');
    }
}