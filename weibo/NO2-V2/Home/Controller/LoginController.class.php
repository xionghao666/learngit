<?php 
	namespace Home\Controller;
	use Think\Controller;
	class LoginController extends Controller{
		public function index(){
			if(IS_POST){
				//dump($_POST);
				//exit;
				//验证验证码
				$yzm=$_POST['code'];
				//dump($_SESSION);exit;
				$Verify=new \Think\Verify();
				$result=$Verify->check($yzm);
				if(!$result)$this->error('验证码错误');
				$user=D('users');
				$map['username']=$_POST['username'];
				$map['password']=md5($_POST['password']);
				$info=$user->where($map)->find();
				if(empty($info)){
					$this->error('用户名或密码不正确');
				}else{
					//记录到SESSION
					$_SESSION['home']=$info;
					$this->redirect('Index/index');
				}
			}else{
				$this->display();
			}
		}
		public function logout(){
			unset($_SESSION['home']);
			$this->redirect('Login/index');
		}
		public function yzm(){
			$config=array(
				'fontSize'    =>    30,   // 验证码字体大小    
				'length'      =>    4,     // 验证码位数
				'useNoise'    =>    false, // 关闭验证码
			);
			$Verify=new \Think\Verify($config);
			$Verify->entry();
		}
		public function forget(){
			if(IS_POST){
				//短信接口地址
				$target = "http://106.ihuyi.cn/webservice/sms.php?method=Submit";
				//获取手机号
				$mobile = $_POST['mobile'];
				//获取验证码
				$send_code = $_POST['send_code'];
				//生成的随机数
				$mobile_code = random11(4,1);
				if(empty($mobile)){
					exit('手机号码不能为空');
				}
				//防用户恶意请求
				if(empty($_SESSION['send_code']) or $send_code!=$_SESSION['send_code']){
					exit('请求超时，请刷新页面后重试');
				}

				$post_data = "account=C94701160&password=e9c85970e7fbb46f7fd77744376f2ae9&mobile=".$mobile."&content=".rawurlencode("您的验证码是：".$mobile_code."。请不要把验证码泄露给其他人。");
				//用户名请登录用户中心->验证码、通知短信->帐户及签名设置->APIID
				//查看密码请登录用户中心->验证码、通知短信->帐户及签名设置->APIKEY
				$gets =  xml_to_array(Post($post_data, $target));
				if($gets['SubmitResult']['code']==2){
					$_SESSION['mobile'] = $mobile;
					$_SESSION['mobile_code'] = $mobile_code;
				}
				echo $gets['SubmitResult']['msg'];
				
			}else{
				$_SESSION['send_code'] = random11(6,1);
				$this->display();	
			}
			
		}
		public function check(){
			if(IS_POST){
				if($_POST['mobile']!=$_SESSION['mobile'] or $_POST['mobile_code']!=$_SESSION['mobile_code'] or empty($_POST['mobile']) or empty($_POST['mobile_code'])){
						exit('手机验证码输入错误。');	
					}else{
						$map['phone'] = $_SESSION['mobile'];
						$user = D('Users');
						$userinfo = $user->where($map)->find();
						$this->assign('userinfo',$userinfo);
						$this->display();
					}
			}
		}
		public function edit(){
			if(IS_POST){
				if($_POST['password']==$_POST['repassword']){
					unset($_POST['repassword']);
					$_POST['password'] = md5($_POST['password']);
					$user = D('Users');
					$userinfo = $user->save($_POST);
					// dump($userinfo);exit;
                    $this->success('修改成功',U('Login/index'));
					
				}else{
					$this->error('密码输入不一致');
				}
			}
		}
	}
 ?>