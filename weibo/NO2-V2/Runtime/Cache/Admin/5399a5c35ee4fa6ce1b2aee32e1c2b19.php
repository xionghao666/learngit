<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title></title>
	<!-- bootstrap css -->
	<link rel="stylesheet" type="text/css" href="/NO2V2/Public/css/bootstrap.min.css" />	
	<link rel="stylesheet" type="text/css" href="/NO2V2/Public/css/style.css" />	
	<!--响应式特性 css-->	
	<link rel="stylesheet" type="text/css" href="/NO2V2/Public/css/bootstrap-responsive.min.css" />
	<!-- jquery -->
	<script type="text/javascript" src="/NO2V2/Public/js/jquery-1.8.3.min.js"></script>
	<!-- bootstrap.js -->
	<script type="text/javascript" src="/NO2V2/Public/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="row-fluid" id="header">	
		<div class="span8 offset2">				
			<h1 class="font">微博后台管理系统</h1>
			<p class="lead"></p>				
		</div>			
    </div>

<div class="row-fluid" id="main">
		<div class="span8 offset2">	
			<form class="form-horizontal" action="<?php echo U('edit');?>" method="post">
				<input type="hidden" name="id" value="<?php echo ($info["id"]); ?>">
				<h3>个人基本信息</h3>
				<div class="control-group">
					<label class="control-label" for="inputEmail">私信内容</label>
					<div class="controls">
						<textarea name="text" value="<?php echo ($info["text"]); ?>" id="inputEmail" style="resize: none;"></textarea>
					</div>
				</div>
				<div class="control-group">
					<div class="controls">
						<label class="checkbox">
							&nbsp;
						</label>
						<button class="btn btn-large btn-primary form-submit" type="submit">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;提交&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
					</div>
				</div>
			</form>			
		</div>
	</div>
<div class="row-fluid" id="footer">	
		<div class="span8 offset2">				
			<p>©2016 - 2017 Beyond-微博</p>				
		</div>			
    </div>
	
</body>
</html>