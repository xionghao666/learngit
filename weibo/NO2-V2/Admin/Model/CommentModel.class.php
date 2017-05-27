<?php 
	namespace Admin\Model;
	use Think\Model;
	class CommentModel extends Model{
		public function getSelect(){
			$textlist=$this->select();
			foreach($textlist as $key=>$val){
				$textlist[$key]['addtime']=date("Y-m-d H:i:s",$val['addtime']);
			}
			return $textlist;
		}
	}
 ?>