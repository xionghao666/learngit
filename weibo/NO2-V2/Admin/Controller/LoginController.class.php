<?php 
  namespace Admin\Controller;
  use Think\Controller;
  class LoginController extends Controller{

       public function Login(){
       	  if(IS_POST){
             $map['username'] = $_POST['username'];
             $map['password'] = md5($_POST['password']);
             $user = D('Users');
             $res = $user->where($map)->find();
                
                   if(empty($res)){
                     $this->error('密码或用户名不正确');
                   }else{
                           if($res['state']==2){
                             $_SESSION['admin'] = $res;
                           $this->redirect('User/index');
                         }else{
                          $this->error('权限不足');
                          }
                   }

       	  }else{
       	  	$this->display();
           
       	  }
       }
    public function logout(){
       unset($_SESSION['admin']);
       $this->redirect('Login/login');
    }

  	
  }
 ?>