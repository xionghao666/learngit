<?php 
	namespace Admin\Model;
	use Think\Model;
	class ChatModel extends Model{
		public function getSelect(){
			$chatlist=$this->select();
			foreach($chatlist as $key=>$val){
				$chatlist[$key]['time']=date("Y-m-d H:i:s",$val['time']);
			}
			return $chatlist;
		}
	}
 ?>