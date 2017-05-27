<?php 
 namespace Admin\Controller;
 use Think\Controller;
 class EmptyController extends CommonController{
 	public function index(){
 		echo "不存在的控制器";
 	}
 	public function _empty(){
 		echo "不存在的方法";
 	}
 }
 ?>