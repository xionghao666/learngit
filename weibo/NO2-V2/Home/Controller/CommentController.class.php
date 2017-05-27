<?php
namespace Home\Controller;
use Think\Controller;
header("content-type:text/html;charset=utf-8");
class CommentController extends CommonController {
    public function index(){
    	if(IS_POST){
    		//对应的微博 评论数增加
            $text = D('Text');
            $arr =array("id"=>$_POST['tid']);
			$text->where($arr)->setInc('commentnum'); 

 			//查询发表该微博的人的昵称 和 ID
            $name = $text->where($arr)->find();
            $_POST['getname'] = $name['nickname'];
            $_POST['getid'] = $name['uid'];
            $_POST['text'] = htmlspecialchars($_POST['text']);
    		// dump($name);

    		//添加到评论表中
    		$comment = D('Comment');
            $_POST['uid'] = $_SESSION['home']['id'];
            $_POST['sendname'] = $_SESSION['home']['nickname'];
            $time = time();
            $_POST['addtime'] = $time;
            $comment->add($_POST);
            $this->success('发布成功');
    	}
        else{
    		//查询微博的内容
    		$text = D('Text');
    		$arr =array("id"=>$_GET['id']);
    		$result = $text->where($arr)->getfind();
    		$this->assign('text',$result);
            

            
    		//查询该微博的评论
    		$arr1 =array("tid"=>$_GET['id']);
    		$comment = D('Comment');
    		$info = $comment->where($arr1)->order('addtime desc')->getselect();
    		$this->assign('info',$info);

    		// dump($info);
	    	foreach ($info as $key => $val) {
				$ids[] = $val['id'];
			}
            //通过递归 查询所有涉及到这条微博的所有评论
            //递归思路:找到一条评论 看他是否存在TID 如果有就找到了对应的微博
            //         如果没有就表明这条评论a是评论(动词)的另一条评论b
            //         那么就根据评论a的CID(评论b的ID)找到评论b
            //         如果评论b有TID 那么评论a 评论b都属于这个tid的评论
            //         如果没有 继续查询 (进入递归) 直到找到存在tid的评论为止
            //         此前的所有评论都是最后这条微博的评论
    		$neirong = $comment->dgsearch($ids);
    		// dump($neirong);
    		foreach ($neirong as $value) {
                if(!empty($value)){
                    foreach ($value as $key => $val){
                    
                         $huifu[] = $val;
                    }
                }
    		} 
            // dump($huifu);
    		$this->assign('huifu',$huifu);

            
    		$this->display();
    	}
    }

    public function reply(){
    	

    		$text = D('Text');
            $arr =array("id"=>$_POST['tid']);
            
			$text->where($arr)->setInc('commentnum'); 

			
    		//将回复 添加到评论表中
    		$comment = D('Comment');
    		$_POST['uid'] = $_SESSION['home']['id'];
            $time = time();
            $_POST['addtime'] = $time;
            $_POST['sendname'] = $_SESSION['home']['nickname'];
			//查询发表该回复的人的昵称和ID
			$arr2 =array("id"=>$_POST['cid']);
            $name = $comment->where($arr2)->find();
            $_POST['getname'] = $name['sendname'];
            $_POST['getid'] = $name['uid'];

    		$comment->add($_POST);

    		//回复成功 跳转到被评论微博的评论页面(评论某条微博的主页)
    		$this->success("回复成功");
    }

    public function del()
    {
        $text = D('Text');
        $text->where('id='.$_GET['tid'])->setDec('commentnum');

        $comment = D('Comment');
        $comment->where('id='.$_GET['id'])->delete();
        $this->success("删除成功");

        
    }

    public function praise()
    {
        $id = $_GET['id'];
        $praise = D('Praise');
        $comment = D('Comment');
        $arr = array( 
            'uid' => $_SESSION['home']['id'],
            'cid' => $id
            );
        $arr1 = array('id'=> $id);
        $result = $praise->where($arr)->find();
        if($result){
            $praise->where($arr)->delete();
            $comment->where($arr1)->setDec('praisenum');
            $this->success("已取消点赞");
        }else{
            $praise->add($arr);
            $comment->where($arr1)->setInc('praisenum');
            $this->success("点赞成功!");
        }
    }

    public function show()
    {
        $comment = D('comment');
        $this->display();
    }
}