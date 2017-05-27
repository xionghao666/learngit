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
<div class="row-fluid" id="nav">	
		<div class="span8 offset2" id="box">
			<ul class="nav nav-pills">
				<li>
					<a href="<?php echo U('index');?>">首页</a>
				</li>
				<li class="dropdown" >
					<a href="#"  class="dropdown-toggle" data-toggle="dropdown" href="#">用户管理<b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo U('User/add');?>">添加用户</a></li>
						<li><a href="<?php echo U('User/index');?>">用户列表</a></li>
					</ul>
				</li>
				<li><a href="<?php echo U('Text/index');?>" id="text">微博管理</a></li>
				<li><a href="<?php echo U('Comment/index');?>" id="text">评论管理</a></li>
				<li><a href="<?php echo U('Chat/index');?>">私信管理</a></li>
				<li><a href="<?php echo U('Inter/index');?>">用户关系管理</a></li>
				<li class="dropdown" >
					<a href="#"  class="dropdown-toggle" data-toggle="dropdown" href="#">微博话题管理<b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo U('Topic/add');?>">添加话题</a></li>
						<li><a href="<?php echo U('Topic/index');?>">话题列表</a></li>
					</ul>
				</li>
				<li class="dropdown" >
					<a href="#"  class="dropdown-toggle" data-toggle="dropdown" href="#">广告投放管理<b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo U('Ad/add');?>">添加广告图</a></li>
						<li><a href="<?php echo U('Ad/index');?>">广告列表</a></li>
					</ul>
				</li>
				<li class="dropdown">
					<a href="#"  class="dropdown-toggle" data-toggle="dropdown" href="#">admin<b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo U('login/logout');?>">注销</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	<script type="text/javascript">
		$('#box ul li a').click(function(){
			$this.parent().addClass('active').sibilings().removeClass('active');
		})
	</script>
<div class="row-fluid" id="main">
		<div class="span8 offset2">	
			<form class="form-horizontal " action="<?php echo U('edit');?>" method="post" enctype="multipart/form-data">
				<input type="hidden" name="id" value="<?php echo ($info["id"]); ?>">
				<h3>广告内容</h3>
				<div class="control-group">
					<label class="control-label" for="inputEmail"></label>
					<div class="controls">
						<input type="hidden" id="inputEmail" name="id" value="<?php echo ($adinfo['id']); ?>" />
						<input type="file" id="inputEmail" name="picname"/><br/>
						<input type="hidden" id="inputEmail" name="picname" value="<?php echo ($adinfo['picname']); ?>" />
						<select name="start">
							<option value="1" <?php echo ($adinfo['start']==1?'selected':''); ?>>停用</option>
							<option value="2" <?php echo ($adinfo['start']==2?'selected':''); ?>>启用</option>
						</select><br/>
						<input type="text" id="inputEmail" name="url" value="<?php echo ($adinfo['url']); ?>" /><br/>
					</div>
				</div>
				<div class="control-group">
					<div class="controls">
						<label class="checkbox">
							&nbsp;
						</label>
						<button class="btn btn-large btn-primary form-submit" type="submit">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;确定&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
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