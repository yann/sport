<?php
namespace Home\Controller;
use Think\Controller;
use Think\Model;

class LoginController extends Controller{
    public function login()
    {
        $this->display();
    }
    public function do_login()
    {
//验证验证码
        $Verify = new \Think\Verify();
        if(!$Verify->check($_POST['loverify'],'lo'))
        {
            $this->error('验证码错误');
        }

        $id = $_POST['inputStuNum'];
        $password = $_POST['inputPassword'];

        $checkbox=$_POST['checkbox'];
        /*   thinkphp的sql操作函数
           $m=M('user');
           $where['id']=$id;
           $where['password']=$password;
           $count=$m->where($where)->select();*/
        $m=new Model();
        $sql="select * from `sport_user` WHERE `id`='$id'and `password`='$password'";
        //$sql2="select ID from `sport_user` WHERE `id`='$id'and `password`='$password'";
        $count=$m->query($sql);
       if($count!=null)
       {
           //thinphp的sql函数
           //$date['name']= $m->where($where)->getField('name');
           //$date['id']=$m->where($where)->getField('id');

         /*  //取出登录者的name作为session
           $sql1="select NAME from `sport_user` WHERE `id`='$id'and `password`='$password'";
           $date=$m->query($sql1);
            $name= $date[0]['NAME'];
           session('name',$name);*/

           //取出登录者的信息作为session
         $sql1="select * from `sport_user`WHERE `id`='$id'and `password`='$password' ";
           $date=$m->query($sql1);
            $id=$date[0]['id'];
            $name=$date[0]['name'];
           $classid=$date[0]['classid'];
           $grade=$date[0]['grade'];
           $academy=$date[0]['academy'];
           $sex=$date[0]['sex'];
           $project=$date[0]['project'];

           session('id',$id);
           session('name',$name);
           session('classid',$classid);
           session('grade',$grade);
           session('academy',$academy);
           session('sex',$sex);
           session('project',$project);


           $this->success('登录成功',U('Index/index'),3);
       }
        else{
            $this->error('用户名或密码错误！');
        }
    }
    public function verify()
    {
        $Verify = new \Think\Verify();
        $Verify->fontSize = 20;
        $Verify->length   = 4;
        $Verify->useNoise = false;
        $Verify->entry('lo');
    }

}