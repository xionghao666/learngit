<?php 
namespace Admin\Model;
use Think\Model;
class AdModel extends Model{
	public function getselect(){
		$adinfo = $this->select();
		$arr = array('1'=>'停用','2'=>'启用');
      	foreach ($adinfo as $key => $val) {
        $adinfo[$key]['start'] = $arr[$val['start']];
      }
      return $adinfo;
	}
}
 ?>
