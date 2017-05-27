<?php
namespace Home\Controller;
use Think\Controller;
header("content-type:text/html;charset=utf-8");
class AtController extends CommonController {
	public function index()
	{
		//查AT表 拿到当前登录用户 所有被AT的微博的ID
		$at = D('At');
		$tid = $at->where('atid='.$_SESSION['home']['id'])->select();
		//拼接字符串作为查询TEXT表的条件
		$str = "(";
		foreach($tid as $k => $v)
		{
			$str .= $v['tid'].",";
		}
		$str = rtrim($str,',').")";
		//以str为条件查询所有带AT的微博的内容
		$text = D('text');
        $count = $text->where('id in '.$str)->count();
        $page = new \Think\Page($count,5);
		$result = $text->where('id in '.$str)->limit($page->firstRow.','.$page->listRows)->order('addtime desc')->getselect();
        $pageButton = $page->show();
		//查询每条微博是否携带转发微博(tid是否有值 ,如果有则遍历查询左右repost属性携带到前台)
		
        //修改所查询到的AT的 READ字段改为2 即改为已读
        $arr = array(
            'atid'=>$_SESSION['home']['id']
            );
        $arr1 = array(
            'read'=>'2'
            );
        $at->where($arr)->save($arr1);
        
        $this->assign('pageButton',$pageButton);		
		$this->assign('result',$result);
		$this->display();
	}

	public function del()
    {
        $text = D('Text');
        $result = $text->where('id='.$_GET['id'])->find();
        
        //如果为转发的微博,对原微博的转发数进行减1
        if(!empty($result['tid']))
        {
            $text->where('id='.$result['tid'])->setDec('repostnum');
        }
        $text->where('id='.$_GET['id'])->delete();

        $this->success("删除成功");
    }

    public function praise()
    {
        $id = $_GET['id'];
        $praise = D('Praise');
        $text = D('Text');
        $arr = array( 
            'uid' => $_SESSION['home']['id'],
            'tid' => $id
            );
        $arr1 = array('id'=> $id);
        $result = $praise->where($arr)->find();
        if($result){
            $praise->where($arr)->delete();
            $text->where($arr1)->setDec('praisenum');
            $this->success('已取消点赞');
        }else{
            $praise->add($arr);
            $text->where($arr1)->setInc('praisenum');
            $this->success('已点赞');
        }

    }

}