<?php 
	namespace Admin\Controller;
	use Think\Controller;
	class TextController extends CommonController{
		public function index(){
			$_GET['addtime']=time();
			if(!empty($_GET['nickname']))$map['nickname']=array('like',"%{$_GET['nickname']}%");
			if(!empty($_GET['text']))$map['text']=array('like',"%{$_GET['text']}%");
			$text=D('text');
			$count=$text->where($map)->count();
			$page=new \Think\Page($count,6);
			$textlist=$text->where($map)->limit($page->firstRow.','.$page->listRows)->getSelect();
			// dump($textlist);
			$pageButton=$page->show();
			$this->assign('textlist',$textlist);
			$this->assign('pageButton',$pageButton);
			$this->assign('offset',$page->firstRow);
			$this->assign('a','1');
			$this->display();
		}
		public function edit(){
			$id=$_GET['id'];
			$text=D('text');
			if(IS_POST){
				$text->save($_POST);
				$this->redirect('index');
			}else{
				$info=$text->find($id);
				$this->assign('info',$info);
				$this->display();
			}
		}
		public function del(){
			$id=$_GET['id'];
			$text=D('text');
			$text->delete($id);
			$this->redirect('index');
		}
	}
 ?>