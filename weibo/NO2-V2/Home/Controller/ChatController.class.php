<?php 
namespace Home\Controller;
use Think\Controller;
class ChatController extends Controller{
	public function chat(){
		// dump($_GET);
		// exit;
		if(IS_POST){
             $chat = D('Chat');
               

		         $upload = new \Think\Upload();// 实例化上传类    
		         $upload->maxSize   =     3145728 ;// 设置附件上传大小

               if($_POST){

                      $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
                      $upload->rootPath = './';   
                      $upload->savePath  =      'Public/Uploads/'; // 设置附件上传目录
                      $upload->autoSub = false;
                      $info   =   $upload->upload();
                 if(!$info) {              // 上传错误提示错误信息
                        $this->error($upload->getError());
                     }else{// 上传成功
                                 
                          foreach ($info as $file) {
                              $_POST['picname'] =  $file['savename'];  
                              
                          }
                      $_POST['time'] = time();    
                         
                     $chat->create();
                          
                         if($chat->add()){
                             // $this->success('私信成功','Index/index');
                            $this->redirect('Person/index');
                            }else{
                                $this->error('私信失败');
                            }
                        }
                 }else{
                     $this->error($user->getError());

                     }
		}else{

            $getid = $_GET['id'];
            $this->assign('getid',$getid);
            $this->display();
		}
	}
}
 ?>
