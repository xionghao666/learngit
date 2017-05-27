<?php
namespace Home\Controller;
use Think\Controller;
header("content-type:text/html;charset=utf-8");
class CommonController extends Controller {

	public function _initialize(){
		if(empty($_SESSION['home']))
			$this->redirect('Login/index');
		}
}