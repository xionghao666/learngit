<?php 
namespace Admin\Controller;
use Think\Controller;
class TopicController extends Controller{
    public function index(){
    	if(!empty($_GET['topic'])) $map['topic'] = array('like',"%{$_GET['topic']}%");
    	$topic = D('Topic');
    	$count = $topic->where($map)->count();

    	$page = new \Think\Page($count,3);
    	$pageButton = $page->show();
    	$topiclist = $topic->where($map)->limit($page->firstRow.','.$page->listRows)->select();
		
		// dump($topiclist);exit;
		$this->assign('topiclist',$topiclist);
		$this->assign('pageButton',$pageButton);
		$this->display();    	
    }
    public function del(){
    	$id = $_GET['id'];
    	$topic = D('Topic');
        $info = $topic->where('id='.$id)->delete();
        if($info){
            $this->success('删除成功');
        }else{
            $this->error('删除失败');
        }
    	
    	
    }
    public function add(){
        if(IS_POST){
            $topic = D('Topic');
               
            // dump($_POST);exit;
                 $upload = new \Think\Upload();// 实例化上传类    
                 $upload->maxSize   =     3145728 ;// 设置附件上传大小

               if($_POST){

                      $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
                      $upload->rootPath = './';   
                      $upload->savePath  = 'Public/images/'; // 设置附件上传目录
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

                         $topic->create();
                          
                         if($topic->add()){
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
 }
 ?>
