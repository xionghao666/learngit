<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>微博话题传送门 </title>
<link rel="stylesheet" type="text/css" href="/NO2V2/Public/Topic/css/styles.css" />
 <!--[if lt IE 9]><script type="text/javascript" src="js/excanvas.js"></script><![endif]-->
<script src="/NO2V2/Public/Topic/js/jquery.min.js"></script>
<script src="/NO2V2/Public/Topic/js/jquery.tagcanvas.js" type="text/javascript"></script>
<script type="text/javascript">
 $(document).ready(function() {
   if( ! $('#myCanvas').tagcanvas({
     textColour : '#ffffff',
     outlineThickness : 1,
     maxSpeed : 0.03,
     depth : 0.75
   })) {
     // TagCanvas failed to load
     $('#myCanvasContainer').hide();
   }
   // your other jQuery stuff here...
 });
 </script>
</head>
<body id="introduction">
<div id="page">
	<div id="container" class="content clearfix">
<!---->
 <canvas width="300" height="300" id="myCanvas">
  <p>Anything in here will be replaced on browsers that support the canvas element</p>
  <ul>
   <li><a href="<?php echo U('Topic/index',array('topic'=>'职场'));?>" target="_blank">职场</a></li>
   <li><a href="<?php echo U('Topic/index',array('topic'=>'时尚穿搭'));?>">时尚穿搭</a></li>
   <li><a href="<?php echo U('Topic/index',array('topic'=>'川普'));?>">川普</a></li>
   <li><a href="<?php echo U('Topic/index',array('topic'=>'明星'));?>">明星</a></li>
   <li><a href="<?php echo U('Topic/index',array('topic'=>'搞笑'));?>">搞笑</a></li>
   <li><a href="<?php echo U('Topic/index',array('topic'=>'综艺'));?>">综艺</a></li>
   <li><a href="<?php echo U('Topic/index',array('topic'=>'超跑'));?>">超跑</a></li>
   <li><a href="<?php echo U('Topic/index',array('topic'=>'汽车'));?>">汽车</a></li>
   <li><a href="<?php echo U('Topic/index',array('topic'=>'维多利亚'));?>">维密秀</a></li>
   <li><a href="<?php echo U('Topic/index',array('topic'=>'医学'));?>">医学</a></li>
   <li><a href="<?php echo U('Topic/index',array('topic'=>'电影'));?>">电影</a></li>
   <li><a href="<?php echo U('Topic/index',array('topic'=>'新闻'));?>">新闻时事</a></li>
   <li><a href="<?php echo U('Topic/index',array('topic'=>'娱乐'));?>">八卦娱乐</a></li>
   <li><a href="<?php echo U('Topic/index',array('topic'=>'秘密'));?>">秘密</a></li>
  </ul>
 </canvas>
  </div>   
 </div> 
</div> 
     <div style="width: 100px;height: 100px;top:200px;left:600px;position: absolute;"><img src="/NO2V2/Public/images/xingqu.png" alt=""></div>
</body>
</html>