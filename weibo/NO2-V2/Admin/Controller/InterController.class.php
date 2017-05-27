<?php
namespace Admin\Controller;
use Think\Controller;
class InterController extends CommonController {
	public function index(){
	    if(!empty($_GET['uid']))$map['uid'] = $_GET['uid'];
        
		$inter = D('Inter');
        $count = $inter->where($map)->count();

        $page = new \Think\Page($count,6);
        $pageButton = $page->show();
		$interlist = $inter->where($map)->limit($page->firstRow.','.$page->listRows)->select();
		$this->assign('interlist',$interlist);
		$this->assign('pageButton',$pageButton);
		$this->display();
	}

	public function del(){
		$id = $_GET['id'];
		
		
		$inter = M('Inter');

		$info = $inter->delete($id);
		if($info){
			$this->success('删除成功');
		}else{
			$this->error('删除失败');
		}
		
	}

	
}