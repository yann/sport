<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Model;

class PlayerController extends Controller {

    public function player()
    {
        $content = $this->fetch('Header:header');
        $this->show($content);
        $this->display();
    }
    public function getPlayer(){

        $m=new Model();
        $m->query('set names utf8');
        $array=$m->query('select * from `sport_player`');
        echo json_encode($array);
    }
    public function deletePlayer()
    {
        $id= $_POST['date'];
        $m = new Model();
        $count= substr_count($id,',')+1;
       /* if($count=1) {

           $cou= $m->execute("delete from `sport_player` WHERE id='$id'");
            if($cou>0)
            {
                echo "删除一个语句成功";  //删除成功
            }
            else{
                echo "删除一个语句失败";  //删除失败
            }
        }*/

        //删除多个值得时候
     if($count>=1)
        {
            $array=explode(',',$id);
            for($i=0;$i<$count;$i++)
            {
                $cou= $m->execute("delete from `sport_player` WHERE id='$array[$i]'");
                if($cou>1)
                {
                    echo '删除成功';
                }
                else{
                    echo "删除失败";
                }
            }
        }
        else{
            echo "没有值过来";
        }
    }

 public function updatePlayer()
 {
     
 }
}