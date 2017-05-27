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
		    <form class="form-search fr" action="<?php echo U('index');?>" method="get">
		    	<input type="text" name="nickname" value="<?php echo ($_GET['nickname']); ?>" class="input-medium" placeholder="昵称">
		    	<input type="text" name="text" value="<?php echo ($_GET['text']); ?>" class="input-medium" placeholder="内容关键字">
		    	<button type="submit" class="btn">搜索</button>
		    </form>

			<table class="table table-striped">
				<thead>
				<tr>
					<th>ID</th>
					<th>用户ID</th>
					<th>昵称</th>
					<th>头像</th>
					<th>内容</th>
					<th>图片名</th>
					<th>发布时间</th>
					<th>浏览次数</th>
					<th>评论数</th>
					<th>转发数</th>
					<th>点赞数</th>
					<th>附带微博(转发)</th>
					<th>操作</th>
				</tr>
				</thead>
				<tbody>
					<?php if(!empty($textlist)): if(is_array($textlist)): foreach($textlist as $key=>$val): ?><tr>
						<td><?php echo ($offset+$a++); ?></td>
						<td><?php echo ($val["uid"]); ?></td>
						<td><?php echo ($val["nickname"]); ?></td>
						<td><?php echo ($val["head"]); ?></td>
						<td><?php echo ($val["text"]); ?></td>
						<td><?php echo ($val["picname"]); ?></td>
						<td><?php echo ($val["addtime"]); ?></td>
						<td><?php echo ($val["browsenum"]); ?></td>
						<td><?php echo ($val["commentnum"]); ?></td>
						<td><?php echo ($val["repostnum"]); ?></td>
						<td><?php echo ($val["praisenum"]); ?></td>
						<td><?php echo ($val["tid"]); ?></td>
						<td>
							<a href="<?php echo U('del',array('id'=>$val['id']));?>">删除</a>
							<a href="<?php echo U('edit',array('id'=>$val['id']));?>">修改</a>
						</td>
					</tr><?php endforeach; endif; ?>
					<?php else: ?>
					<tr>
						<td colspan="6">查无数据</td>
					</tr><?php endif; ?>
				</tbody>
			</table>
			<div class="pagination">
				<ul>
					<?php echo ($pageButton); ?>
				</ul>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		$('.pagination ul a').unwrap('div').wrap('<li></li>');
		$('.pagination ul span').wrap('<li class="active"></li>');
	</script>
	<div class="row-fluid" id="footer">	
		<div class="span8 offset2">				
			<p>©2016 - 2017 Beyond-微博</p>				
		</div>			
    </div>
	
</body>
</html>