<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>密码设置</title>
<link href="/NO2V2/Public/styles/global.css" type="text/css" rel="stylesheet" />
<link href="/NO2V2/Public/styles/login.css" type="text/css" rel="stylesheet" />
<!-- <script src="/NO2V2/Public/script/login.js" language="javascript"></script> -->
<script src="/NO2V2/Public/script/trim.js" language="javascript"></script>
<script src="/NO2V2/Public/jquery-1.7.2.min.js"></script>
</head>

<body>
<!--页面整体-->
<div id="container">
<!-- top部分DIV -->
	<div id="top">
    	<!-- top部分的LogoDIV -->
    	<div id="topLogo">
        	<!-- topLogo部分的icoDIV -->
            <div id="topLogoIco"> <a href="index.html"><img src="/NO2V2/Public/images/logo.png" width="90" height="72" alt="" /></a>
          </div>
            <!-- topLogo部分的icoDIV结束 -->
            
            <!-- topLogo部分的wordDIV -->
            <div id="topLogoWord" style="position: absolute;left: 90px;top: 2px;"> <a href="index.html"><img src="/NO2V2/Public/images/weico.png" width="180" height="70" alt="" /></a>
          </div>
            <!-- topLogo部分的wordDIV -->
        </div>
        <!-- top部分的LogoDIV结束 -->
        
        <!-- top部分的文字导航 -->
        <div id="topWordMenu">
        	<ul>
            	<ul>
                <li><a href="<?php echo U('index/index');?>">首页</a></li>
                <li><a href="<?php echo U('Person/index');?>">我的微博</a></li>
                <li><a href="<?php echo U('Safety/index');?>">安全中心</a></li>
                <li><a href="<?php echo U('Person/edit');?>">设置</a></li>
                <li><a href="<?php echo U('Login/logout');?>">退出</a></li>
            </ul>
            </ul>
        </div>
        <!-- top部分的文字导航结束 -->
    </div>
    <!-- top部分结束 -->
<!-- 页面主体 -->
 <div id="banner">
   <!-- 页面左部 -->
   <div id="left">
   <!--页面左部表单设置-->
   <form id="LoginForm" action="<?php echo U('Safety/index');?>" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo ($_SESSION['home']['id']); ?>">
     <table width="565" border="0" cellspacing="0" cellpadding="0">
       <tr class="lb">
         <td></td>
         <td></td>
         <td></td>
         <td></td>
       </tr>
       <tr>
         <td class="le"></td>
         <td class="ld">意见箱</td>
         <td class="if"><textarea name="advise" class="la" id="userId" cols="50" rows="20"></textarea></td>
         <td></td>
       </tr>
       
        
       <tr>
         <td class="le"></td>
         <td class="ld"></td>
         <td><a href="#">
           <input name="button" type="submit" class="lc" id="button" value="保存" />
         </a></td>
         <td></td>
       </tr>
     </table>
     </form>
     <!--页面左部表单结束-->
   </div>
   <!-- 页面右部 -->
   <div id="right">
   			<!--页面右部文字及按钮设置-->
   			<div class="bs">
        		关于密码
            </div>
            <div class="ds">
                <p style="color:black">设置强度较高的账户密码（建议使用6~20位字母+数字+特殊符号，字幕区分大小写）</p>
                <p style="color:black">避免使用用户名，连续或相同的数字作为密码 </p>
            </div>
   	</div>
  </div>
   <!--页面右部文字及按钮设置结束-->
<!-- footer部分 -->
    <div id="footer">
    	<!-- footer网站链接部分 -->
    	<div id="footerLink">
        	<ul>
            	<li><a href="#">灵步网介绍</a></li>
                <li><a href="#">广告服务</a></li>
                <li><a href="#">API</a></li>
                <li><a href="#">诚征英才</a></li>
                <li><a href="#">保护隐私权</a></li>
                <li><a href="#">免责条款</a></li>
                <li><a href="#">法律顾问</a></li>
                <li><a href="#">意见反馈</a></li>
            </ul>
        </div>
        <!-- footer网站链接部分结束 -->
        <!-- footer网站版权信息 -->
        <div id="footerCopy">
        	Copyright&copy;2011-2012 灵步小组 版权所有
        </div>
        <!-- footer网站版权信息结束 -->
    </div>
    <!-- footer部分结束 -->
</div>
</body>
<script type="text/javascript">

    $('#passWord').blur(function(){
        var $parent=$(this).parent();

        //验证新密码
        if(this.value==""||this.value.match(/^[0-9a-zA-Z_]{6,20}$/)==null){
            //$(this).next().val("密码强度不够奥!")
            var errorMsg="密码强度不够奥!";
            $(this).focus(function(){
            $('span').html("")
            
            })
            $parent.append('<span>'+errorMsg+'</span>').css('color','red');
           
        }else{
            var okMsg="密码强度可以的";
            $parent.append('<span>'+okMsg+'</span>').css('color','red');
        }
    })
</script>
</html>