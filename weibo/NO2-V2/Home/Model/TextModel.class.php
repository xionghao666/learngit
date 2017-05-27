<?php
namespace Home\Model;
use Think\Model;
class TextModel extends Model {

	public function getselect(){
		$result = $this->select();
		//把时间戳格式化
		//添加删除按钮
		foreach($result as $key=>$val){
			$result[$key]['addtime'] = date("Y-m-d H:i",$val['addtime']);
			if($val['uid'] == $_SESSION['home']['id'])
			{
				$result[$key]['delButton'] = "删除";
			}else{
				$result[$key]['mesButton'] = "私信";
			}
		}
		$collect=D('collect');
		foreach($result as $key=>$val){
			$arr=array('uid'=>$_SESSION['home']['id'],'wbid'=>$result[$key]['id']);
			$num=$collect->where($arr)->count();
			if($num>=1){
				$result[$key]['collectButton']="★已收藏";
			}else{
				$result[$key]['collectButton']="☆收藏";
			}
		}

 		//判断当前用户对某条微博是否已点赞
		$praise = D('Praise');
		foreach ($result as $key => $val) {
			$arr =array(
				'uid'=>$_SESSION['home']['id'],
				'tid'=>$result[$key]['id']
				);
			$num = $praise->where($arr)->count();
			if($num == 1){
				$result[$key]['praiseButton'] = "已点赞";
			}else{
				$result[$key]['praiseButton'] = "点赞";
			}
		}
		//判断微博是否为转发微博
		foreach ($result as $key => $val) {
			if(!empty($val['tid']))
			{
				$repost = D('text');
				$result[$key]['repost'] = $repost->where('id='.$val['tid'])->find();
				
			}
				

		}
		return $result;

	}


	public function getfind(){

		$result = $this->find();

		//把时间戳格式化
		$result['addtime'] = date("Y-m-d H:i",$result['addtime']);

		return $result;
	}
	
	public function getAll(){

		$map['uid'] = $_SESSION['admin']['id'];
		//$map['uid'] = 1;
		$text = M('Text');
		$textlist = $text->where($map)->select();
		foreach($textlist as $val){
		  $val['addtime'] = date('Y-m-d H:i:s',$val['addtime']);
		}
		
		
		return $val;
	}

}