<?php
namespace Home\Model;
use Think\Model;
class CommentModel extends Model {
	public function getselect(){

		$result = $this->select();

		foreach($result as $key=>$val){
			$result[$key]['addtime'] = date("Y-m-d H:i:s",$val['addtime']);
			if($val['uid'] == $_SESSION['home']['id'])
			{
				$result[$key]['delButton'] = "删除";
			}
		}
		
		// exit;
		//判断当前用户对某条评论是否已点赞
		$praise = D('Praise');
		foreach ($result as $key => $val) {
			$arr =array(
				'uid'=>$_SESSION['home']['id'],
				'cid'=>$result[$key]['id']
				);
			$num = $praise->where($arr)->count();
			if($num == 1){
				$result[$key]['praiseButton'] = "已点赞";
			}else{
				$result[$key]['praiseButton'] = "点赞";
			}
		}
		// dump($result);
		return $result;
	}
	public function dgsearch($ids)
	{
		
		//把评论ID作为回复的CID条件 进行in查询
		foreach ($ids as $key => $val) {
			// $huifu[$val]="";
			$str .=$val.",";
		}
		$str ="(".rtrim($str,',').")";
		
		$arr = 'cid in'.$str;
		$result = $this->where($arr)->getselect();
		$neirong[] = null;
		if(!empty($result)){
			$ids = "";
			foreach ($result as $key => $val) {
				$ids[]=$val[id];
				$neirong[ $val[cid] ][]=$val;
			}
			$huifu = $this->dgsearch($ids);
			//把两个数组合并为一个数组
			$neirong = array_merge($huifu,$neirong);
		}
		return $neirong;
	}

	// public function adddelButton(){
	// 	foreach($result as $key=>$val){
	// 		$result[$key]['addtime'] = date("Y-m-d H:i",$val['addtime']);
	// 		if($val['uid'] == $_SESSION['home']['id'])
	// 		{
	// 			$result[$key]['delButton'] = "删除";
	// 		}
	// 	}
	// }

	
}