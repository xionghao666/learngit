<?php
namespace Home\Controller;
use Think\Controller;
header("content-type:text/html;charset=utf-8");
class RepostController extends CommonController {
	public function index()
	{
		if(IS_POST)
		{
			
			$_POST['uid'] = $_SESSION['home']['id'];
			$_POST['addtime'] = time();
			// dump($_SESSION);
			$_POST['nickname'] = $_SESSION['home']['nickname'];
			// dump($_POST);
			$text = D('Text');
			//tid 指的是 转发的这条微博的ID
			$text->where('id='.$_POST['tid'])->setInc('repostnum');
			//ttid 指的是 转发的这条是否附带了微博 ttid为附带的这条微博的ID
			$text->where('id='.$_POST['ttid'])->setInc('repostnum');
			unset($_POST['ttid']);
			$_POST['head'] = $_SESSION['home']['picname'];
			$insertid = $text->add($_POST);
			//取的上一次添加进TEXT的ID 作为下面AT表的TID
			$lastid = mysql_insert_id();
			//AT表操作
			//取得被转发微博的发表人的ID
			$info = $text->where('id='.$_POST['tid'])->find();
			$arr = array(
				'atid' => $info['uid'],
				'uid' => $_SESSION['home']['id'],
				'tid' => $lastid
				);
			$at = D('at');
			$at->add($arr);

			//判断转发微博时候 输入的内容(text)里面有没有涉及到AT
			//正则匹配 根据@:来找到被AT的nickname
			// $name = preg_match("/^@(.*?):$/",$_POST['text']);
			preg_match_all("/@(.*?):/",$_POST['text'],$name);
			//$name本身是一个二维数组 $name['0']里面的内容是带@和:的 所以只取$name['1']中的内容
			$name = $name['1'];
			//把$name里面的内容 加上一个'',方便后面遍历查找的时候作为条件
			foreach ($name as $key => $val) {
				$name[$key] = "'".$val."'";
			}
			$user = D('users');
			//遍历$name 把每一个val(每一个找到的nickname)都作为nickname的查找条件
			//把找到的ID作为atid 添加到AT表里面
			//把INT转换成字符串型
			$lastid = $lastid."";
			foreach ($name as $key => $val) {
				$id = $user->where('nickname ='.$name[$key])->find();
				$arr1 = array(
					'atid' => $id['id'],
					'uid' => $_SESSION['home']['id'],
					'tid' => $lastid
				);
				$at->add($arr1);
			}
            $this->success('转发成功', '/NO2V2/Home/Index/index');

		}else{
			// dump($_GET);
			// 要转发的微博是原创微博
			if(empty($_GET['tid']))
			{
				$id = $_GET['id'];
				$text = D('Text');
				$arr = array('id'=>$id);
				$result = $text->where($arr)->find();
				$this->assign('result',$result);
				// dump($result);
				$this->display();
			}else
			{
				//查询被转发的原微博的内容
				//这是一条已经被转发过的微博找到原创内容
				$tid = $_GET['tid'];
				$text = D('Text');
				$arr = array('id'=>$tid);
				$result = $text->where($arr)->find();
				$this->assign('result',$result);
				// dump($result);
				// exit;
				//查询被转发的微博的内容
				$id = $_GET['id'];
				$text1 = D('Text');
				$arr1 = array('id'=>$id);
				$result1 = $text->where($arr1)->find();
				$this->assign('result1',$result1);
				// dump($result1);
				$this->display();
			}
			
		}
	}
}