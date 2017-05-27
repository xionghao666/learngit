<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
<script language="javascript" src="/NO2V2/Public/jquery-1.7.2.min.js"></script>
	<style>
	   body{background-image:url(/NO2V2/Public/images/meinv.jpg);background-repeat:round;}
       #kk{float:left;margin:10px;width:160px;height:160px;overflow:hidden;}
	   #big{margin-top:70px;margin-left:400px;width:600px;height:600px;}

	</style>
</head>
<body>
	<form action="<?php echo U('Topic/choose');?>" method="post">
		
	
       <div id="big">
       	<?php if(is_array($topiclist)): foreach($topiclist as $key=>$val): ?><div id="kk">
           <input type="checkbox" name="id[]" value="<?php echo ($val["id"]); ?>">
           <div style="margin-top:10px;margin-left:10px;width:140px;height:100px;background-image: url(/NO2V2/Public/images/<?php echo ($val["picname"]); ?>);">
           		
           </div>
         	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($val["topic"]); ?>
         </div><?php endforeach; endif; ?>
       </div>
        <div style="position: absolute;left:1000px;top:400px;">
           <div id="btn" style="height:80px;width: 80px;">
           	<input type="image" src="/NO2V2/Public/images/jiantou1.png" value="提交" style="height:80px;width:120px;" />
           </div>
        	
        </div>
     	
    </form>
    <div style="position: absolute;top: 20px;left: 1200px;"><a href="<?php echo U('Person/index');?>">返回</a></div>
	
</body>
</html>