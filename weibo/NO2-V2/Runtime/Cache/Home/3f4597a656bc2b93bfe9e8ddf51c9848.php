<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>个人设置</title>
<link href="/NO2V2/Public/styles/register.css" type="text/css" rel="stylesheet">
<link href="/NO2V2/Public/styles/global.css" type="text/css" rel="stylesheet"><!-- 
<script src="/NO2V2/Public/script/sitedata_bas.js" language="javascript"></script>
<script src="/NO2V2/Public/script/datecreate.js" language="javascript"></script>
<script src="/NO2V2/Public/script/trim.js" language="javascript"></script>
<script src="/NO2V2/Public/script/register.js" language="javascript"></script> -->
  <script src="/NO2V2/Public/jquery-1.7.2.min.js"></script>

</head>
<body>
<div id="container">
  <!-- top部分DIV -->
	<div id="top">
    	<!-- top部分的LogoDIV -->
    	<div id="topLogo">
        	<!-- topLogo部分的icoDIV -->
            <div id="topLogoIco"> <img src="/NO2V2/Public/images/logo.png" width="90" height="72" alt="" />
        </div>
            <!-- topLogo部分的icoDIV结束 -->
            
            <!-- topLogo部分的wordDIV -->
            <div id="topLogoWord" style="position: absolute;left: 90px;top: 2px;"><img src="/NO2V2/Public/images/weico.png" width="180" height="70" alt="" />
          </div>
            <!-- topLogo部分的wordDIV -->
        </div>
        <!-- top部分的LogoDIV结束 -->
        
        <!-- top部分的文字导航 -->
        <div id="topWordMenu">
        	<ul>
            	<li><a href="<?php echo U('index/index');?>">首页</a></li>
                <li><a href="<?php echo U('Person/index');?>">我的微博</a></li>
                <li><a href="<?php echo U('Safety/index');?>">安全中心</a></li>
                <li><a href="<?php echo U('Person/edit');?>">设置</a></li>
                <li><a href="<?php echo U('Login/logout');?>">退出</a></li>
            </ul>
        </div>
        <!-- top部分的文字导航结束 -->
    </div>
    <div id="main">
   <form action="<?php echo U('Person/edit');?>" name="myform" method="post" enctype="multipart/form-data" onsubmit="return docheck()">  
      <input type="hidden" name="id" value="<?php echo ($_SESSION['home']['id']); ?>">
      <table width="765" border="0" cellpadding="0" cellspacing="0">
        <!-- <tr>
            <td>
                <img src="">
            </td>
        </tr> -->
        <tr>
          <td width="71">&nbsp;</td>
          <td width="86" align="center" valign="middle" class="wordleft">用 &nbsp;户&nbsp; 名</td>
          <td width="189" align="center" valign="middle"><input name="username" type="text" class="form" value="<?php echo ($userinfo['username']); ?>" id="username" placeholder="必填" readonly /><font></font></td>
          <td width="419" align="left" valign="middle" class="wordright"><div class="registertip" id="userIDtip"></div></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td align="center" valign="middle" class="wordleft">真&nbsp;实&nbsp;姓&nbsp;名</td>
          <td align="center" valign="middle"><input name="name" type="text" class="form" id="name" value="<?php echo ($userinfo['name']); ?>" placeholder="选填" maxlength="6" /><font></font></td>
          <td align="left" valign="middle" class="wordright"><div class="registertip" id="userNametip"></div></td>
        </tr>
         <tr>
          <td>&nbsp;</td>
          <td align="center" valign="middle" class="wordleft">昵&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;称</td>
          <td align="center" valign="middle"><input name="nickname" type="text" class="form" id="nickname" value="<?php echo ($userinfo['nickname']); ?>" placeholder="必填"  /></td>
          <td align="left" valign="middle" class="wordright"><div class="registertip" id="userMailtip">请修改您的微博昵称</div></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td align="center" valign="middle" class="wordleft">个&nbsp;性&nbsp;签&nbsp;名</td>
          <td align="center" valign="middle"><input name="sign" type="text" class="form" id="sign" value="<?php echo ($userinfo['sign']); ?>" maxlength="15" placeholder="选填"  /><font></font></td>
          <td align="left" valign="middle" class="wordright"><div class="registertip" id="userMailtip">请创造您的个性签名吧！！15个字以内呦</div></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td align="center" valign="middle" class="wordleft">性 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;别</td>
          <td align="center" valign="middle" class="a">
              <select name="sex" style="width:50px">
               <option value="1" <?php echo ($userinfo['sex']==1?'selected':''); ?>>男</option>
               <option value="2" <?php echo ($userinfo['sex']==2?'selected':''); ?>>女</option>
              </select>
          </td>
          <td align="left" valign="middle" class="wordright"><div class="registertip" id="userTeltip"></div></td>
        </tr>
         <tr>
          <td>&nbsp;</td>
          <td align="center" valign="middle" class="wordleft">地 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;址</td>
          <td align="center" valign="middle" class="a"><input name="address" type="text" class="form" id="address" value="<?php echo ($userinfo['address']); ?>" placeholder="选填" maxlength="30" /><font></font></td>
          <td align="left" valign="middle" class="wordright"><div class="registertip" id="userTeltip"></div></td>
        </tr>
         <tr>
          <td>&nbsp;</td>
          <td align="center" valign="middle" class="wordleft">电 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;话</td>
          <td align="center" valign="middle" class="a"><input name="phone" type="text" class="form" id="phone" value="<?php echo ($userinfo['phone']); ?>" placeholder="选填"  /><font></font></td>
          <td align="left" valign="middle" class="wordright"><div class="registertip" id="userTeltip">请输入您的手机号码，之后可以用手机及时发布信息</div></td>
        </tr>
         <tr>
          <td>&nbsp;</td>
          <td align="center" valign="middle" class="wordleft"> E-mail</td>
          <td align="center" valign="middle" class="a"><input name="email" type="text" value="<?php echo ($userinfo['email']); ?>" class="form" id="email" placeholder="必填"/><font color="red"></font></td>
          <td align="left" valign="middle" class="wordright"><div class="registertip" id="userTeltip">便于我们与您更快联系</div></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td align="center" valign="middle" class="wordleft">头&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;像</td>
          <td align="center" valign="middle"><input name="picname" type="file" class="form" id="userMail" value="<?php echo ($userinfo['picname']); ?>" placeholder="必填"  style="height:80%" /></td>
          <td align="left" valign="middle" class="wordright"><div class="registertip" id="userMailtip">请上传您的头像</div></td>
        </tr>
        <tr>
          <td colspan="4" align="center" valign="middle"><input type="submit" id="button" value="保存" class="button"/></td>
          </tr>
      </table>
    </form>
    </div>
    <!-- footer部分 -->
    <div id="footer">
    	<!-- footer网站链接部分 -->
    	<div id="footerLink">
        	<ul>
            	<li><a href="#">Weico网介绍</a></li>
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
        	Copyright&copy;2017-2018 Weico小组 版权所有
        </div>
        <!-- footer网站版权信息结束 -->
    </div>
    <!-- footer部分结束 -->
</div>
</div>
</body>
<script>
    function docheck(){

      var myform = document.myform;
      if(myform.phone.value.match(/^[1][3-8][0-9]{9}$/)==null){
          
        $('#phone').next().html('&nbsp;&nbsp;号码格式不正确！！');
        return false;
      }
     if(myform.email.value.match(/^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+((\.[a-zA-Z0-9_-]{2,3}){1,2})$/)==null){
        $('#email').next().html('&nbsp;&nbsp;邮箱格式不正确！！');
        return false;
      }
      if(myform.name.value.length>6){
        $('#name').next().html("&nbsp;&nbsp;抱歉您的名字过长！");
        return false;
      }
      if(myform.address.value.length>30){
        $('#address').next().html("&nbsp;&nbsp;抱歉您的地址过长！");
        return false;
      }
    }
      
   </script>
</html>