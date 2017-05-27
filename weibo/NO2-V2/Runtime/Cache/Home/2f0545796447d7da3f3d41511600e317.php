<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="<?php echo U('Login/edit');?>" method="post">
		<input type="hidden" name="id" value="<?php echo ($userinfo['id']); ?>">
		新密码：<input type="password" name="password">
		确认密码：<input type="password" name="repassword">
		<input type="submit" value="提交">
	</form>
</body>
</html>