<?php
namespace Admin\Controller;
use Think\Controller;
class UserController extends CommonController {
    public function index(){
      // dump($_GET);exit;
     if(!empty($_GET['username']))$map['username']=array('like',"%{$_GET['username']}%");
     if(strlen($_GET['state']) > 0)$map['state']=$_GET['state'];
      // dump($map);
       $user = D('Users');
       $count = $user->where($map)->count();
       
       // dump($userlist);
       $page = new \Think\Page($count,3);

       $pageButton = $page->show();

        $userlist = $user->where($map)->limit($page->firstRow.','.$page->listRows)->getAll();
        
       $this->assign('userlist',$userlist);
      
       $this->assign('pageButton',$pageButton);

       $this->display();
    }

    public function add(){
           
        //文件上传与用户数据写入数据库
     if(IS_POST){

		        $user = D('Users');
               
            // dump($_POST);exit;
		         $upload = new \Think\Upload();// 实例化上传类    
		         $upload->maxSize   =     3145728 ;// 设置附件上传大小

               if($_POST){

                      $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
                      $upload->rootPath = './';   
                      $upload->savePath  = 'Public/Uploads/'; // 设置附件上传目录
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

                         $user->create();
                          
                         if($user->add()){
                             $this->success('添加成功','Index/index');
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

       public function del(){
           $id = $_GET['id'];

           $user = M('users');
           $res = $user->delete($id);
           if($res){
            
              $this->redirect('index');
           }else{
            $this->error('删除失败');
           }
         }  

      public function edit(){
    	 $id = $_GET['id'];
    	 $user=D('Users');

    	if(IS_POST){

          $map['id'] = $_POST['id'];
          $userinfo = $user->where($map)->find();
            //如果不需要修改密码则走此路
          if($_POST['oldpass']== '')
          {
            
              $user = D('Users');
                     $upload = new \Think\Upload();// 实例化上传类    
                     $upload->maxSize   =     3145728 ;// 设置附件上传大小

              if($_POST){

                      $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
                      $upload->rootPath = './';   
                      $upload->savePath  =      'Public/Uploads/'; // 设置附件上传目录
                      $upload->autoSub = false;
                      $info   =   $upload->upload();
                 if(!$info){              // 上传错误提示错误信息
                        // $this->error($upload->getError());
                      if(!empty($userinfo['picname'])){
                        $_POST['picname'] = $userinfo['picname'];
                        }else{
                            $_POST['picname'] =  "null.jpg";
                        } 
                        
                  }else{
                            // 上传成功
                      foreach ($info as $file) {
                            $_POST['picname'] =  $file['savename']; 
                        }
                  }
                $info1=$user->create();
                unset($info1['password']);
                if($info1){
                  $user->save($info1);
                  //dump($a);exit;
                  $this->success('修改成功','Index/index');
                }else{
                  //echo $user->getLastSql();exit;
                  $this->error('修改失败');
                }

              }else{
                    $this->error($user->getError());
              }
        }else{
              //如果需要修改密码 则走这边
            $_POST['oldpass'] = md5( $_POST['oldpass']);
            if($_POST['oldpass'] == $userinfo['password']){

                if($_POST['password'] == $_POST['repass']){

                    $user = D('Users');
                    $upload = new \Think\Upload();// 实例化上传类    
                    $upload->maxSize   =     3145728 ;// 设置附件上传大小

                    if($_POST){
                        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
                        $upload->rootPath = './';   
                        $upload->savePath  =      'Public/Uploads/'; // 设置附件上传目录
                        $upload->autoSub = false;
                        $info   =   $upload->upload();
                        if(!$info) {              // 上传错误提示错误信息
                        // $this->error($upload->getError());
                            if(!empty($userinfo['picname'])){
                                $_POST['picname'] = $userinfo['picname'];
                            }else
                            {   
                                $_POST['picname'] =  "null.jpg";
                            }
                        }else{// 上传成功
                            foreach ($info as $file) {
                                $_POST['picname'] =  $file['savename'];  
                            }
                        }
                        $user->create();
                        if($user->save()){
                            $this->success('修改成功','Index/index');
                        }else{
                            $this->error('修改失败');
                        }

                    }else{
                        $this->error($user->getError());

                    }
                }else{
                    $this->error('两次密码输入不一致');
                }
             
            }else{
                $this->error('原密码输入错误');
            }        
        }
       
    	}else{
    		$info = $user->find($id);
    		$this->assign('info',$info);
    		$this->display();
    	}
    }
      public function _empty(){
      	echo "404不存在的方法";
      }
  

}