<?php 
namespace Home\Controller;
use Think\Controller;
header("content-type:text/html;charset=utf-8");
class SxController extends CommonController {
    public function index(){
    	if(IS_POST){
      if($_POST['getid']==0){
        $this->error('当前没有收信人');
      }  
			$chat = D('Chat');
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
                        $_POST['picname'] =  "null.jpg";  
                        
                    }else{// 上传成功
                                 
                            foreach ($info as $file){
                            $_POST['picname'] =  $file['savename'];  
                           		}
                    }
                    	$time = time();
			      		$_POST['time'] = $time;
			      		$_POST['sendid'] = $_SESSION['home']['id'];
			      		$_POST['sendnickname'] = $_SESSION['home']['nickname'];
			      		$_POST['sendpicname'] = $_SESSION['home']['picname'];
			 			    $_POST['read'] = 1;
                        $chat->create();
                          // dump($_POST);exit;
                        if($chat->add()){
                            $this->success('发送成功',U('Index/index'));
                        }else{
                            $this->error('添加失败');
                        }

                }else{
                     $this->error($user->getError());

                }
    	}else{
    		$user = D('Users');
    		$userinfo = $user->where('id='.$_GET['getid'])->find();
    		$this->assign('userinfo',$userinfo);
    		$map['getid'] = $_SESSION['home']['id'];
    		$chat = D('Chat');
    		$data['read'] = 2;
    		$count = $chat->where($map)->count();
    		$page = new \Think\Page($count,5);
            $page->setConfig('prev','上一页');
            $page->setConfig('next','下一页');
    		
           
    		//查询到登录用户所有收到的私信按照时间降序排列  同时修改了read就不在会出现新消息提醒
    		$chatlist = $chat->where($map)->order('time desc')->limit($page->firstRow.','.$page->listRows)->getSelect();
        
        $count = count($chatlist);
        // dump($count);exit;
        $this->assign('count',$count);
			  $chat->where($map)->save($data);
        $pageButton = $page->show();
        $this->assign('pageButton',$pageButton);

    		$this->assign('chatlist',$chatlist);
    		$this->display();
    	}
    }
    public function look(){
         $chat = D('Chat');
		 $map['sendid'] = $_SESSION['home']['id'];
		 $count = $chat->where($map)->count();
         $page = new \Think\Page($count,5);
         $page->setConfig('prev','上一页');
         $page->setConfig('next','下一页');
		 $chatlist = $chat->where($map)->order('time desc')->limit($page->firstRow.','.$page->listRows)->getSelect();
		 // dump($chatlist);exit;
         $pageButton = $page->show();
		 $this->assign('chatlist',$chatlist);
         $this->assign('pageButton',$pageButton);
		 $this->display();
    }
}
 ?>