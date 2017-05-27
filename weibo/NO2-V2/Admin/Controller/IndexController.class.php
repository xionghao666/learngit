<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends CommonController {
    public function index(){
      // dump($_GET);
      if(!empty($_GET['name']))$map['name']=array('like',"%{$_GET['name']}%");
      if(strlen($_GET['state']) > 0)$map['state']=$_GET['state'];
      // dump($map);
      $user = D('Users');
      $count = $user->where($map)->count();
      $page = new \Think\Page($count,3);
      $pageButton = $page->show();
      $userlist = $user->where($map)->limit($page->firstRow.','.$page->listRows)->getAll();
      $this->assign('userlist',$userlist);
      $this->assign('pageButton',$pageButton);
      $this->assign('a',1);
      $this->assign('offset',$page->firstRow);
      $this->display();
    }
  

}