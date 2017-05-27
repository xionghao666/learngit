<?php 
namespace Admin\Controller;
use Think\Controller;
class AdController extends Controller{
    public function index(){
    	$ad = D('Ad');
      $count = $ad->count();
      $page = new \Think\Page($count,5);
     
      $adlist = $ad->limit($page->firstRow.','.$page->listRows)->select();
       $pageButton = $page->show();
      $arr = array('1'=>'停用','2'=>'启用');
      foreach ($adlist as $key => $val) {
        $adlist[$key]['start'] = $arr[$val['start']];
      }
      // dump($adlist);exit;
      $this->assign('pageButton',$pageButton);
      $this->assign('adlist',$adlist);
      $this->display();
    }
    public function del(){
    	$id = $_GET['id'];
    	$ad = D('Ad');
        $info = $ad->where('id='.$id)->delete();
        if($info){
            $this->success('删除成功');
        }else{
            $this->error('删除失败');
        }
    	
    	
    }
    public function add(){
        if(IS_POST){
            $ad = D('Ad');
               
            // dump($_POST);exit;
                 $upload = new \Think\Upload();// 实例化上传类    
                 $upload->maxSize   =     3145728 ;// 设置附件上传大小

               if($_POST){

                      $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
                      $upload->rootPath = './';   
                      $upload->savePath  = 'Public/guanggao/img/'; // 设置附件上传目录
                      $upload->autoSub = false;
                      $info= $upload->upload();
                 if(!$info) {              // 上传错误提示错误信息
                        // $this->error($upload->getError());
                           $_POST['picname'] =  "null.jpg";  
                      }else{// 上传成功
                                 
                          foreach ($info as $file) {
                            $_POST['picname'] =  $file['savename'];  
                            }
                      }

                         // $ad->create();
                          
                         if($ad->add($_POST)){
                             $this->success('添加成功','index');
                                         }else{
                                               $this->error('添加失败');
                                              }

                 }else{
                     $this->error($user->getError());

                     }
        }else{
            $this->display();
        }
    }
    public function edit(){
      if(IS_POST){
        $ad = D('ad');
               
                 $upload = new \Think\Upload();// 实例化上传类    
                 $upload->maxSize   =     3145728 ;// 设置附件上传大小

               if($_POST){

                      $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
                      $upload->rootPath = './';   
                      $upload->savePath  = 'Public/guanggao/img/'; // 设置附件上传目录
                      $upload->autoSub = false;
                      $info= $upload->upload();
                 if(!$info) {              // 上传错误提示错误信息
                           $_POST['picname'] =  $_POST['picname'];  
                      }else{// 上传成功
                                 
                          foreach ($info as $file) {
                            $_POST['picname'] =  $file['savename'];  
                            }
                      }
                          // dump($_POST);exit;
                         $ad->create();
                          
                         if($ad->save()){
                             $this->success('更改成功','index');
                         }else{
                            $this->error('更改失败');
                         }

                 }else{
                     $this->error($user->getError());
                     }    
      }else{
        $map['id'] = $_GET['id'];
        $ad = D('Ad');
        $adinfo = $ad->where($map)->find();
        // dump($adinfo);exit;
        $this->assign('adinfo',$adinfo);
        $this->display();
      }
    }
    public function huan(){
      $map['id'] = $_GET['id'];
      $ad = D('Ad');
      $adinfo = $ad->where($map)->find();
      if($adinfo['start']==1){
        $map1['id'] = $_GET['id'];
        $map1['start'] = 2;
        $ad->save($map1);
        $this->redirect('Ad/index');
      }else{
        $map1['id'] = $_GET['id'];
        $map1['start'] = 1;
        $ad->save($map1);
        $this->redirect('Ad/index');
      }
    }
 }
 ?>
