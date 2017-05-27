<?php
namespace Home\Controller;
use Think\Controller;
header("content-type:text/html;charset=utf-8");
class ShowController extends CommonController {
	public function index()
	{
        
		//查询当前登录用户所有被评论的内容
		$comment = D('comment');
		$arr = array(
			'getid'=>$_SESSION['home']['id']
			);
		$count=$comment->where($arr)->count();
		$page = new \Think\Page($count,6);
        $page->setConfig('prev','上一页');
        $page->setConfig('next','下一页');
        $pageButton = $page->show();
		
		$result = $comment->where($arr)->order('addtime desc')->limit($page->firstRow.','.$page->listRows)->getselect();
		$pageButton = $page->show();
		$this->assign('pageButton',$pageButton);
		// dump($result);
		// exit;
		//修改所查询到的评论的 READ字段改为2 即改为已读
		$arr1 = array(
			'read'=>'2'
			);
		$comment->where($arr)->save($arr1);

		// dump($pageButton);
		$this->assign('result',$result);
		$this->display();
		// dump($result);
	}

	 public function del()
    {
        $text = D('Text');
        $text->where('id='.$_GET['tid'])->setDec('commentnum');

        $comment = D('Comment');
        $comment->where('id='.$_GET['id'])->delete();
        $this->success("删除成功");

        
    }
}