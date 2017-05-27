<?php if (!defined('THINK_PATH')) exit();?>
    <!DOCTYPE HTML>
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
                    <h3>个人基本信息</h3>
                   <input type="hidden" name="id" value="<?php echo ($info['id']); ?>"/>
                    
                    <div class="control-group">
                         <label class="control-label" for="inputEmail">真实姓名</label>
                         <div class="controls">
                              <input type="text" id="inputEmail" name="name" value="<?php echo ($info['name']); ?>" placeholder="真实姓名">
                         </div>
                    </div>
                    <div class="control-group">
                         <label class="control-label" for="inputEmail">性别</label>
                        <div class="controls">
                         <select name="sex" value="<?php echo ($info['sex']); ?>">
                               <option value="">请选择</option>
                               <option value="1" <?php echo ($info['sex'] ==1?'selected':''); ?>>男</option>
                               <option value="2" <?php echo ($info['sex'] ==2?'selected':''); ?>>女</option>
                         </select>
                         </div>
                    </div>
                    <div class="control-group">
                         <label class="control-label" for="inputEmail">地址</label>
                         <div class="controls">
                              <input type="text" id="inputEmail" name="address" value="<?php echo ($info['address']); ?>" placeholder="地址">
                         </div>
                    </div>
                    <div class="control-group">
                         <label class="control-label" for="inputEmail">联系电话</label>
                         <div class="controls">
                              <input type="text" id="inputEmail" name="phone" value="<?php echo ($info['phone']); ?>" placeholder="电话">
                         </div>
                    </div>
                    <div class="control-group">
                         <label class="control-label" for="inputEmail">E-mail</label>
                         <div class="controls">
                              <input type="text" id="inputEmail" name="email" value="<?php echo ($info['email']); ?>" placeholder="Email">
                         </div>
                    </div>
                    < <div class="control-group">
                         <label class="control-label" for="inputEmail">头像</label>
                         <div class="controls">
                              <input type="file" id="inputEmail" name="picname" placeholder="头像">
                         </div>
                    </div>
                    <div class="control-group">
                         <label class="control-label" for="inputEmail">昵称</label>
                         <div class="controls">
                              <input type="text" id="inputEmail" name="nickname" value="<?php echo ($info['nickname']); ?>" placeholder="昵称">
                         </div>
                    </div>
                    
                    <div class="control-group">
                         <label class="control-label" for="inputEmail">状态</label>
                         <div class="controls">
                              <select name="state" value="<?php echo ($info['state']); ?>">
                                   <option value="1" <?php echo ($info['state'] ==1?'selected':''); ?>>普通用户</option>
                                   <option value="2" <?php echo ($info['state'] ==2?'selected':''); ?>>管理员</option>
                                   <option value="3" <?php echo ($info['state'] ==3?'selected':''); ?>>禁用</option>
                                   <option value="4" <?php echo ($info['state'] ==4?'selected':''); ?>>VIP</option>
                              </select>
                         </div>
                    </div>
                     <div class="control-group">
                         <label class="control-label" for="inputEmail">原密码</label>
                         <div class="controls">
                              <input type="password" id="inputEmail" name="oldpass" placeholder="原密码">
                         </div>
                    </div>
                    <div class="control-group">
                         <label class="control-label" for="inputEmail">新密码</label>
                         <div class="controls">
                              <input type="password" id="inputEmail" name="password"  placeholder="新密码">
                         </div>
                    </div>
                    <div class="control-group">
                         <label class="control-label" for="inputEmail">确认新密码</label>
                         <div class="controls">
                              <input type="password" id="inputEmail" name="repass" placeholder="再次确认">
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