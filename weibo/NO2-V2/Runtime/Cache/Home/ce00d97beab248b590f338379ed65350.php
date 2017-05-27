<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=gb2312" />
<title>找回密码</title>
</head>
<script type="text/javascript" src="/NO2V2/Public/jquery.js"></script>
<script language="javascript">
	function get_mobile_code(){
        $.post("<?php echo U('Login/forget');?>", {mobile:jQuery.trim($('#mobile').val()),send_code:<?php echo $_SESSION['send_code'];?>}, function(msg) {
            alert(jQuery.trim(unescape(msg)));
			if(msg=='提交成功'){
				RemainTime();
			}
        });
	};
	var iTime = 59;
	var Account;
	function RemainTime(){
		document.getElementById('zphone').disabled = true;
		var iSecond,sSecond="",sTime="";
		if (iTime >= 0){
			iSecond = parseInt(iTime%60);
			iMinute = parseInt(iTime/60)
			if (iSecond >= 0){
				if(iMinute>0){
					sSecond = iMinute + "分" + iSecond + "秒";
				}else{
					sSecond = iSecond + "秒";
				}
			}
			sTime=sSecond;
			if(iTime==0){
				clearTimeout(Account);
				sTime='获取手机验证码';
				iTime = 59;
				document.getElementById('zphone').disabled = false;
			}else{
				Account = setTimeout("RemainTime()",1000);
				iTime=iTime-1;
			}
		}else{
			sTime='没有倒计时';
		}
		document.getElementById('zphone').value = sTime;
	}	
</script>
<body>
<form action="<?php echo U('Login/check');?>" method="post" name="formUser">
	<table width="100%"  border="0" align="left" cellpadding="5" cellspacing="3">
		<tr>
			<td align="right">手机<td>
		<input id="mobile" name="mobile" type="text" size="25" class="inputBg" /><span style="color:#FF0000"> *</span> 
        <input id="zphone" type="button" value=" 获取手机验证码 " onClick="get_mobile_code();"></td>
        </tr>
		<tr>
			<td align="right">验证码</td>
			<td><input type="text" size="8" name="mobile_code" class="inputBg" /></td>
		</tr>
		<tr>
			<td align="right"></td>
			<td><input type="submit" value=" 提交 " class="button"></td>
		</tr>
	</table>
</form>
</body>
</html>