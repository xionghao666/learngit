<?php 
	namespace Admin\Controller;
	use Think\Controller;
	class CommentController extends CommonController{
		public function index(){
			$comment=D('Comment');
			if(!empty($_GET['sendname']))$map['sendname']=array('like',"%{$_GET['sendname']}%");
			if(!empty($_GET['text']))$map['text']=array('like',"%{$_GET['text']}%");
			$count=$comment->where($map)->count();
			$page=new \Think\Page($count,6);
			$textlist=$comment->where($map)->limit($page->firstRow.','.$page->listRows)->getSelect();
			//dump($textlist);
			$pageButton=$page->show();
			$this->assign('textlist',$textlist);
			$this->assign('pageButton',$pageButton);
			$this->display();
		}

		public function edit(){
			$id=$_GET['id'];
			$comment=D('Comment');
			if(IS_POST){
				$comment->save($_POST);
				$this->redirect('index');
			}else{
				$info=$comment->find($id);
				$this->assign('info',$info);
				$this->display();
			}
		}


		public function del(){
			$id=$_GET['id'];
			$comment=D('Comment');
			$comment->delete($id);
			$this->redirect('index');
		}
	}