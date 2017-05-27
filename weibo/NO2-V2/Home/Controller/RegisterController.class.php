<?php 
namespace Home\Controller;
use Think\Controller;
class RegisterController extends Controller {
   
   
     public function index(){

     	if(IS_POST){
        //前台注册如果有POST传值过来则创建用户，成功后跳转到登录界面
          $user = D('users');
          // dump($_POST);exit;
          if(!($_POST['password']==$_POST['repassword']))
          {
            $this->error('密码确认不一致!');
          }else{
            $_POST['state'] = 1;
            $_POST['sign'] = "我还没有个性签名哟(囧死啦)！";
            $user->create();
            if($user->add()){
            // $this->redirect('Login/index');
            $this->success('注册成功',U('Login/index'));
            }
          }
     		
     	}else{
     		$this->display();
     	}
     }
     public function ajaxName(){

     	//AJAX验证用户名，如果用户名已存在则提示被注册

     	if(IS_AJAX){
     		$map = $_GET;
     		$user =M('Users');
            if(!(preg_match("/^[a-zA-Z0-9_]{4,18}$/", $_GET['username']))){
                $this->ajaxReturn("&nbsp;&nbsp;用户名不可用");
            }
            $userinfo = $user->where($map)->find();
            if(empty($userinfo)){
            	$this->ajaxReturn("&nbsp;&nbsp;可以使用");
            }else{
            	$this->ajaxReturn("&nbsp;&nbsp;用户名不可用");
            }

     		
     	}
     } 

}
 ?>
