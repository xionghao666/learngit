<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>微博后台登录  </title>

<link href="/NO2V2/Public/Login/css/main.css" rel="stylesheet" type="text/css" />

</head>
<body>

  <form action="<?php echo U('Login/login');?>" method="post">
<div class="login">
    <div class="box png">
		<div class="logo png"></div>
		<div class="input">
           
			<div class="log">
				<div class="name">
					<label>用户名</label><input type="text" class="text" id="value_1" placeholder="用户名" name="username" tabindex="1">
				</div>
				<div class="pwd">
					<label>密　码</label><input type="password" class="text" id="value_2" placeholder="密码" name="password" tabindex="2">
					<input type="submit" class="submit" tabindex="3" value="登录">
					<div class="check"></div>
				</div>
				<div class="tip"></div>
			</div>

		</div>
	</div>
    <div class="air-balloon ab-1 png"></div>
	<div class="air-balloon ab-2 png"></div>
    <div class="footer"></div>
</div>
</form>
<script type="text/javascript" src="/NO2V2/Public/Login/js/jQuery.js"></script>
<script type="text/javascript" src="/NO2V2/Public/Login/js/fun.base.js"></script>
<script type="text/javascript" src="/NO2V2/Public/Login/js/script.js"></script>


<!--[if IE 6]>
<script src="js/DD_belatedPNG.js" type="text/javascript"></script>
<script>DD_belatedPNG.fix('.png')</script>
<![endif]-->


</body>
</html>