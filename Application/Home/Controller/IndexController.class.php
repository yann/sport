<?php
namespace Home\Controller;
use Think\Controller;
use Think\Model;

class IndexController extends Controller {
    public function index()
    {
         $m=new Model();
        /*运动快报*/
       /* $arr=$m->query('select * from `sport_news`');
        $this->assign('arr',$arr);*/
        $User = M('news'); // 实例化User对象
        $count=$User->count();
        $pagecount=4;
        $page1 = new \Think\Page($count , $pagecount);
        $page1->setConfig('first','首页');
        $page1->setConfig('prev','上一页');
        $page1->setConfig('next','下一页');
        $page1->setConfig('last','尾页');
        $page1->setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% 第 '.I('p',1).' 页/共 %TOTAL_PAGE% 页 ( '.$pagecount.' 条/页 共 %TOTAL_ROW% 条)');
        $show1 = $page1->show();
        $array = $User->limit($page1->firstRow.','.$page1->listRows)->select();
        $this->assign('news',$array);
        $this->assign('page1',$show1);




        /*预告消息*/
        //$array=$m->query('select * from `sport_project` ORDER BY `hosttime` asc limit 0,4' );
        //$this->assign('array',$array);
        $User = M('project'); // 实例化User对象
        $count=$User->count();
        $pagecount=4;
        $page = new \Think\nPage($count , $pagecount);
        $page->setConfig('first','首页');
        $page->setConfig('prev','上一页');
        $page->setConfig('next','下一页');
        $page->setConfig('last','尾页');
        $page->setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% 第 '.I('p',1).' 页/共 %TOTAL_PAGE% 页 ( '.$pagecount.' 条/页 共 %TOTAL_ROW% 条)');
        $show = $page->show();
        $array = $User->limit($page->firstRow.','.$page->listRows)->select();
        $this->assign('array',$array);
        $this->assign('page',$show);
        $this->display();
    }
    public function checkSession()
    {
     if(!isset($_SESSION['name'])||$_SESSION['name']=='')
     {
         $this->ajaxReturn('please login');
     }
        else{
            $this->ajaxReturn($_SESSION['name']);
        }
    }
    public function logout()
    {
        session(null);
        //$this->ajaxReturn("OK");
        $this->redirect('index');
    }

}