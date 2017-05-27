<?php 
	namespace Admin\Controller;
	use Think\Controller;
	class ChatController extends CommonController{
		public function index(){
			if(!empty($_GET['sendid']))$map['sendid']=$_GET['sendid'];
			if(!empty($_GET['text']))$map['text']=array('like',"%{$_GET['text']}%");
			$chat=D('chat');
			$count=$chat->where($map)->count();
			$page= new \Think\Page($count,6);
			$chatlist=$chat->where($map)->limit($page->firstRow.','.$page->listRows)->getSelect();
			$pageButton=$page->show();
			//dump($chatlist);
			$this->assign('chatlist',$chatlist);
			$this->assign('pageButton',$pageButton);
			$this->assign('offset',$page->firstRow);
			$this->assign('a','1');
			$this->display();
		}
		public function edit(){
			$id=$_GET['id'];
			$chat=D('chat');
			if(IS_POST){
				$chat->save($_POST);
				$this->redirect('index');
			}else{
				$info=$chat->find($id);
				$this->assign('info',$info);
				$this->display();
			}
		}
		public function del(){
			$id=$_GET['id'];
			$chat=D('chat');
			$chat->delete($id);
			$this->redirect('index');
		}
	}
 ?>