<?php 
	namespace Home\Controller;
	use Think\Controller;
	class SafetyController extends CommonController{
		public function index(){
			if(IS_POST){
			 //  	dump($_POST);
				// exit;
				if(md5($_POST['oldpass'])==$_SESSION['home']['password']){
					if($_POST['oldpass']!=$_POST['password']){
						if($_POST['password']==$_POST['repass']){
							$user=D('users');
							$id=$_POST['id'];
							$arr=array('password'=>md5($_POST['password']));
							$user->where('id='.$id)->save($arr);
							unset($_SESSION['home']);
							// $this->redirect('Login/index','恭喜您，密码修改成功！页面跳转中...',2);
							$this->success('恭喜您，密码修改成功！页面跳转中...','Login/index');
						}else{
							$this->error('两次密码的输入不一致，请重新输入！');
						}
					}else{
						$this->error("新密码与旧密码相同，请重新修改！");
					}
				}else{
					$this->error('原密码输入错误！');
				}
			}else{
				$this->display();
			}
		}
		public function advise(){
			if(IS_POST){

			}else{
				$this->display();
			}
		}
	}
 ?>