<?php 
 namespace Home\Controller;
 use Think\Controller;
 class PersonController extends CommonController{
 	public function index(){
          
       if(empty($_SESSION['home'])){
       	$this->redirect('Login/index');
       }else{
          //通过获取SESSION中的用户信息 在Inter表查找用户的粉丝和关注数量
          

        $map['id'] = $_GET['id'] ? $_GET['id'] : $_SESSION['home']['id'];
        $map1['uid'] = $_GET['id'] ? $_GET['id'] : $_SESSION['home']['id'];

        $user = D('Users');
        $info = $user->where($map)->find();
        $text = D('Text');
        $count = $text->where($map1)->count();
        $page = new \Think\Page($count,3);
        $page->setConfig('prev','上一页');
        $page->setConfig('next','下一页');
        $textinfo1 = $text->where($map1)->select();
        $wb = count($textinfo1);
        $pageButton = $page->show();
        $textinfo = $text->where($map1)->limit($page->firstRow.','.$page->listRows)->order('addtime desc')->getselect();
        
       
        $inter = D('Inter');
        //选中用户的关注数量
        $interlist = $inter->where($map1)->select();
        $gz = count($interlist);
        // echo $gz;

        $map3['gzid'] = $map['id'];
        $interlist2 = $inter->where($map3)->select();
        $fs = count($interlist2);
        // echo $fs;
        // 选中用户的微博 数量
        $ad = D('Ad');
        $adlist = $ad->where('start =2')->select();
        $this->assign('adlist',$adlist);
        $this->assign('count',$count);
        $this->assign('pageButton',$pageButton);
        $this->assign('textinfo',$textinfo);
        $this->assign('gz',$gz);
        $this->assign('fs',$fs);
        $this->assign('wb',$wb);
        $this->assign('info',$info);

 		    $this->display();
       }
       
 	}
 	public function gz(){
        
        //查看该用户的关注了那些用户
     		// $info = $_SESSION['home'];
        //这样设置也可查看别人的关注用户 和 自己的关注用户 
        $info1 = $_GET['id'] ? $_GET['id'] : $_SESSION['home']['id']; 
     		$map['id'] = $info1;
     		$user = D('Users');
        
     		// $map = $_SESSION['admin'];
     		
     		$info = $user->where($map)->find();
     		$id = $info['id'];
     		$inter = D('Inter');
        $map2['uid'] = $id;
        $interlist = $inter->where($map2)->select();
        // dump($interlist);
        // 选中用户关注数量
        $count = count($interlist);
          for($i = 0;$i < $count;$i++){
            $row[] = $interlist[$i]['gzid'];
          }
          $count1 = count($row);
          $page = new \Think\Page($count1,3);
          
          foreach($row as $key=>$val){
            $str.=$val.",";
          }
          $str = rtrim($str,',');
          $user = D('Users');
          $userinfo = $user->where('id in('.$str.')')->limit($page->firstRow.','.$page->listRows)->select();
            //查找选中用户发了多少条微博
           $map4['uid'] = $map['id'];
           $wb = D('Text');
           $wblist = $wb->where($map4)->select();
           $wbcount = count($wblist);
           //查找选中用户有多少粉丝
           $map5['gzid'] = $map['id'];
           $fs = D('Inter');
           $fslist = $fs->where($map5)->select();
           $fscount = count($fslist);
           $pageButton = $page->show();
           $this->assign('wbcount',$wbcount);
           $this->assign('fscount',$fscount);
           $this->assign('info',$info);
           $this->assign('userinfo',$userinfo);
           $this->assign('count',$count);
           $this->assign('pageButton',$pageButton);
           $this->display(); 
        
        
 	}


 	public function fs(){
        
          //查看该用户有那些粉丝
        // $info = $_SESSION['home'];
        // 这样设置可以查看别人的粉丝 也可查看自己的粉丝
        $info1 = $_GET['id'] ? $_GET['id'] : $_SESSION['home']['id'];
        $map['id'] = $info1;
        $user = D('Users');

        $map1['uid'] = $info1; 
        
        $info = $user->where($map)->find();
        $id = $info['id'];
        $inter = D('Inter');
        $map2['gzid'] = $id;
        //查询了登录用户的关注  和  粉丝
        $interlist1 = $inter->where($map1)->select();
        $interlist = $inter->where($map2)->select();
        // dump($interlist);
        foreach($interlist1 as $key=>$val){
          $id1[] = $val['gzid'];
        }  
        //计算登录用户的粉丝量
        $count = count($interlist);
        //计算登录用户的关注量
        $countgz = count($interlist1);
     
        for($i = 0;$i < $count;$i++){
            $row[] = $interlist[$i]['uid'];
          }
          $count1 = count($row);
          $page = new \Think\Page($count1,3);
          $pageButton = $page->show();
          foreach($row as $key=>$val){
            $str.=$val.",";
          }
          $str = rtrim($str,',');
          $user = D('Users');
          $userinfo = $user->where('id in('.$str.')')->limit($page->firstRow.','.$page->listRows)->select();

          foreach ($userinfo as $key => $val) {
          // 如果查询的用户ID在$id1数组中则增加字段已经关注，否则为未关注
           if(in_array($val['id'], $id1)){
              $userinfo[$key]['gz'] = "已关注";
              $userinfo[$key]['gz1'] = "取消关注";
           }else{
              $userinfo[$key]['gz'] = "未关注";
              $userinfo[$key]['gz1'] = "关注Ta";
           }
         }
         // dump($userinfo);exit;
            //查找选中用户发了多少条微博
           $map4['uid'] = $map['id'];
           $wb = D('Text');
           $wblist = $wb->where($map4)->select();
           $wbcount = count($wblist);
           //查找选中用户有多少粉丝
           $map5['gzid'] = $map['id'];
           $fs = D('Inter');
           $fslist = $fs->where($map5)->select();
           $fscount = count($fslist);
           
           $this->assign('countgz',$countgz);
           $this->assign('wbcount',$wbcount);
           $this->assign('fscount',$fscount);
           $this->assign('info',$info);
           $this->assign('userinfo',$userinfo);
           $this->assign('count',$count);
           $this->assign('pageButton',$pageButton);
           $this->display(); 
 	}
  public function sou(){
        $info = $_SESSION['home'];
        $map['id'] = $info['id'];
        $user = D('Users');

        // $map = $_SESSION['admin'];
        //查询都自己的信息
        $info = $user->where($map)->find();
        $id = $info['id'];
        $inter = D('Inter');
        $map2['uid'] = $id;
        $interlist = $inter->where($map2)->select();
        // dump($interlist);
        // 计算当前用户的总关注量
        $count = count($interlist);
        foreach($interlist as $key=>$val){
          $id1[] = $val['gzid'];
        } 
        // 把所有关注人的ID放进一个数组中
        $sea['nickname'] = $_POST['nickname'];
        $user = D('Users');
        $count1 = $user->where($sea)->count();
        $page = new \Think\Page($count1,3);
        $pageButton = $page->show();
        $userinfo = $user->where($sea)->limit($page->firstRow.','.$page->listRows)->select();
         foreach ($userinfo as $key => $val) {
          // 如果查询的用户ID在$id1数组中则增加字段已经关注，否则为未关注
           if(in_array($val['id'], $id1)){
              $userinfo[$key]['gz'] = "已关注";
              $userinfo[$key]['gz1'] = "取消关注";
           }else{
              $userinfo[$key]['gz'] = "未关注";
              $userinfo[$key]['gz1'] = "关注Ta";
           }
         }
         // dump($userinfo);exit;
         // 发送当前用户总关注量，搜索用户的信息，自己的信息去模版
          $this->assign('count',$count);
          $this->assign('userinfo',$userinfo);
          $this->assign('pageButton',$pageButton);
          $this->assign('info',$info);
          $this->display();
  }
 	public function wb(){
 		      $info = $_SESSION['home'];
          $user = D('users');
          $map['id'] = $info['id'];  
          // $map['id'] = 1;
          $userinfo = $user->where($map)->find();
          $nickname = $userinfo['nickname'];
          $id = $userinfo['id'];
          $map2['uid'] = $id;

          $text = D('Text');
          $textlist[] = $text->where($map2)->getAll();

          // dump($textlist);
          // exit;

          $this->assign('nickname',$nickname);
          $this->assign('textlist',$textlist);
          $this->display();
 	}
  public function qxgz(){
    //查找当前用户是否关注了传来的用户，如果关注则取消关注，未关注则添加关注
     $id = $_GET['id'];
     $map['uid'] = $_SESSION['home']['id'];
     $inter = D('Inter');
     $interinfo = $inter->where($map)->select();
     foreach ($interinfo as $key => $val) {
        $row[] = $val['gzid'];
      }
      // 判断选中的用户是否在登录用户的关注名单中 
      if(in_array($id, $row)){
        $map['gzid'] = $_GET['id'];
        $inter = D('Inter');
        $res = $inter->where($map)->delete();
      }else{
        $map['gzid'] = $_GET['id'];
        $inter = D('Inter');
        $res = $inter->add($map);

      }
      
     
     
        $this->redirect('Person/gz');
    
     
  }
 public function del(){
  $map['id'] = $_GET['id'];
  $text = D('Text');
  $info = $text->where($map)->delete();
  if($info){
    $this->success('删除成功',U('Person/index'));
  }
 }
 public function red(){
  $inter = D('Inter');
  // 以gzid分组并且计算相同gzid数量区别名num  按照num降序排列
  $info = $inter->field('gzid,count(gzid) as num')->group('gzid')->order('num desc')->select();

  foreach($info as $key=>$val){
    $res[] = $val['gzid'];
  }
  foreach($res as $key=>$val){
    $user = D('Users');
    $userinfo[] =$user->where('id='.$val)->select(); 
  }
  foreach($userinfo as $key=>$val){
    foreach($val as $kk=>$vv){
      $resinfo[] = $vv;
    }
  }
  $inter1 = $inter->where('uid ='.$_SESSION['home']['id'])->select();
  foreach($inter1 as $key=>$val){
    $ids[] = $val['gzid'];
  }
  foreach($resinfo as $key=>$val){
    if(in_array($val['id'], $ids)){
      $resinfo[$key]['gz'] = "已关注";
      $resinfo[$key]['gz1'] = "取消关注";
    }else{
      $resinfo[$key]['gz'] = "未关注";
      $resinfo[$key]['gz1'] = "关注Ta";
    }
  }
  $count = count($resinfo);
  $listrows = 3;
  $page = new \Think\Page($count,$listrows);
  $pageButton = $page->show();
  $result = array_slice($resinfo,$page->firstRow,$page->listRows);
  $this->assign('count',$count);
  $this->assign('pageButton',$pageButton);
  $this->assign('result',$result);
  $this->display();
 }
 public function hot(){
  $text = D('Text');
  $count = $text->count();
  $page = new \Think\Page($count,5);
  $textlist = $text->order('praisenum desc')->limit($page->firstRow.','.$page->listRows)->getselect();
  $pageButton = $page->show();
  $this->assign('textlist',$textlist);
  $this->assign('pageButton',$pageButton);
  $this->display();
 }
 	public function edit(){
       if(IS_POST){
            $user = D('Users');
            $map['id']=$_POST['id'];
            $userinfo=$user->where($map)->find();
            $upload = new \Think\Upload();// 实例化上传类    
            $upload->maxSize   =     3145728 ;// 设置附件上传大小

               if($_POST){
                      $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
                      $upload->rootPath = './';   
                      $upload->savePath  =      'Public/Uploads/'; // 设置附件上传目录
                      $upload->autoSub = false;
                      $info   =   $upload->upload();
                 if(!$info) {              // 上传错误提示错误信息
                          if(!empty($userinfo['picname'])){
                            $_POST['picname']=$userinfo['picname'];
                          }else{
                            $_POST['picname']="null.jpg";
                          }
                     }else{// 上传成功
                          foreach ($info as $file) {
                              $_POST['picname'] =  $file['savename'];  
                              
                          }
                      }
                       //$_POST['password']=$userinfo['password'];
                      $_POST['state'] = 1;  
                      $info=$user->create();
                      unset($info['password']);
                      //dump($_POST);exit;
                          if($info){
                            $text = D('Text');
                            $map = array('head'=>$_POST['picname']);
                            $res = $text->where('uid='.$_SESSION['home']['id'])->save($map);
                            $user->save($info);
                            $this->success('修改成功',U('Login/index'));
                          }else{
                            $this->error('修改失败');
                          }
                 }else{
                    $this->error($user->getError());
                }  
           
    }else{
           $map['id'] = $_SESSION['home']['id'];
           $user = D('Users');
           $userinfo = $user->where($map)->find();
           // dump($userinfo);exit;
           $this->assign('userinfo',$userinfo);
           $this->display();
    }
  }
 }
 ?>