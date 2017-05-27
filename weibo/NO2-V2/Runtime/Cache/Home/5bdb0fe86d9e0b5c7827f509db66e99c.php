<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
<script language="javascript" src="/NO2V2/Public/jquery-1.7.2.min.js"></script>
  <style>
      body{background-image:url(/NO2V2/Public/images/wbbg.jpg);background-repeat:round;}
      #kk{float:left;margin:10px;width:160px;height:160px;overflow:hidden;}
      #big{margin-top:70px;margin-left:400px;width:600px;height:600px;}
      
  </style>
</head>
<body>
    
  
       <div id="big">
        <?php if(is_array($topic1list)): foreach($topic1list as $key=>$val): ?><div id="kk">
           <div style="margin-top:10px;margin-left:10px;width:140px;height:100px;background-image: url(/NO2V2/Public/images/<?php echo ($val["picname"]); ?>);">
              
           </div>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($val["topic"]); ?>
         </div><?php endforeach; endif; ?>
       </div>
        
      
    <div style="position: absolute;top: 20px;left: 1200px;"><a href="<?php echo U('Person/index');?>">返回</a></div>
</body>
  <script>
    // $('#btn').click(function(){
      
    // })
  </script>
</html>