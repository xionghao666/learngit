<?php if (!defined('THINK_PATH')) exit();?><!--导入 头部文件-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>微博-点滴生活，精彩世界</title>
<style type="text/css">
            .big{
                width:400px;
                height:400px;
                position:absolute;
                display:none;
                overflow:hidden;
            }
            /*侧边导航*/
            .content{width:260px;margin:100px auto;}
            .filterinput{
             background-color:rgba(249, 244, 244, 0);
            border-radius:15px;
            width:90%;
            height:30px;
            border:thin solid #FFF;
            text-indent:0.5em;
            font-weight:bold;
            color:#FFF;
            }
            #demo-list a{
            overflow:hidden;
            text-overflow:ellipsis;
            -o-text-overflow:ellipsis;
            white-space:nowrap;
            width:100%;
            }
            /*侧边导航*/
        </style>
</head>
<link href="/NO2V2/Public/Autotop/css/woituku.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/NO2V2/Public/Autotop/js/jquery.min.js"></script>
<script language="javascript" src="/NO2V2/Public/jquery-1.7.2.min.js"></script>
<link href="/NO2V2/Public/styles/global.css" type="text/css" rel="stylesheet">
<link href="/NO2V2/Public/styles/friend maneger.css" type="text/css" rel="stylesheet">
  <!-- 侧边导航   -->
<link href="/NO2V2/Public/daohang/css/jquery-accordion-menu.css" rel="stylesheet" type="text/css" />
<link href="/NO2V2/Public/daohang/css/font-awesome.css" rel="stylesheet" type="text/css" />
<script src="/NO2V2/Public/daohang/js/jquery-1.11.2.min.js" type="text/javascript"></script>
<script src="/NO2V2/Public/daohang/js/jquery-accordion-menu.js" type="text/javascript"></script>
<script type="text/javascript">
jQuery(document).ready(function () {
    jQuery("#jquery-accordion-menu").jqueryAccordionMenu();
    
});

$(function(){   
    //顶部导航切换
    $("#demo-list li").click(function(){
        $("#demo-list li.active").removeClass("active")
        $(this).addClass("active");
    })  
})  
</script>
  <!-- 侧边导航 结束  -->
<body style="filter:alpha(opacity=100)" id="totop">
<div class="actGotop"><a href="javascript:;" title="Top"></a></div>
<!-- 火箭回到顶部 -->
<script type="text/javascript">
$(function(){   
    $(window).scroll(function() {       
        if($(window).scrollTop() >= 100){ //向下滚动像素大于这个值时，即出现小火箭~
            $('.actGotop').fadeIn(300); //火箭淡入的时间，越小出现的越快~
        }else{    
            $('.actGotop').fadeOut(300); //火箭淡出的时间，越小消失的越快~
        }  
    });
    $('.actGotop').click(function(){$('html,body').animate({scrollTop: '0px'}, 800);}); //火箭动画停留时间，越小消失的越快~
});
</script>
<!-- 火箭特效结束 -->
<!-- 总容器 container开 始-->
<div>
<div id="container">
	    <!-- topDIV 开始 -->
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
                <li><a href="<?php echo U('Index/index');?>">首页</a></li>
                <li><a href="<?php echo U('Random/index');?>">逛一逛</a></li>
                <li><a href="<?php echo U('Person/index');?>">我的微博</a></li>
                <li><a href="<?php echo U('Safety/index');?>">安全中心</a></li>
                <li><a href="<?php echo U('Person/edit');?>">设置</a></li>
                <li><a href="<?php echo U('Login/logout');?>">退出</a></li>
            </ul>
        </div>
        <!-- top部分的文字导航结束 -->
    </div>
    <div id="newmsg" style="position: absolute;right: 123px;top: 80px; background-color: #8BCBDB;width: 170px;text-align: center;display: none;color: red" ><br/>
    <b >☞ 新 消 息 提 示 ☜</b><br/><br/>
    <div id="new">
        <!-- <a id="newc" ></a><br/><br/>
        <a id="newa" ></a><br/><br/>
        <a id="news" ></a><br/><br/> -->
    </div>  
    
</div>
<!-- 左边侧列表导航栏 -->
<div style="position: fixed;left: 20px;top: -17px;width:100px;height: 300px">

<div class="content">

    <div id="jquery-accordion-menu" class="jquery-accordion-menu red">
        <ul id="demo-list">
         
           <li style="text-align: center"><a href="<?php echo U('Topic/index',array('topic'=>'明星'));?>">明星(<?php echo ($_SESSION['home']['counttopic']); ?>) </a></li>
            <li style="text-align: center"><a href="<?php echo U('Topic/index',array('topic'=>'娱乐'));?>">八卦娱乐(<?php echo ($_SESSION['home']['counttopic1']); ?>) </a></li>
            <li style="text-align: center"><a href="<?php echo U('Topic/index',array('topic'=>'维多利亚'));?>">维密秀(<?php echo ($_SESSION['home']['counttopic11']); ?>) </a></li>
            
            <li style="text-align: center"><a href="<?php echo U('Topic/index',array('topic'=>'汽车'));?>">汽车(<?php echo ($_SESSION['home']['counttopic2']); ?>) </a></li>
            <li style="text-align: center"><a href="<?php echo U('Topic/index',array('topic'=>'医学'));?>">医学(<?php echo ($_SESSION['home']['counttopic3']); ?>) </a></li>
            <li style="text-align: center"><a href="<?php echo U('Topic/index',array('topic'=>'搞笑'));?>">搞笑(<?php echo ($_SESSION['home']['counttopic4']); ?>) </a></li>
            <li style="text-align: center"><a href="<?php echo U('Topic/index',array('topic'=>'时尚穿搭'));?>">时尚穿搭(<?php echo ($_SESSION['home']['counttopic7']); ?>) </a></li>
            
            <li style="text-align: center"><a href="<?php echo U('Topic/index',array('topic'=>'川普'));?>">川普(<?php echo ($_SESSION['home']['counttopic6']); ?>) </a></li>
            <li style="text-align: center"><a href="<?php echo U('Topic/index',array('topic'=>'职场'));?>">职场(<?php echo ($_SESSION['home']['counttopic8']); ?>) </a></li>
            <li style="text-align: center"><a href="<?php echo U('Topic/index',array('topic'=>'电影'));?>">电影(<?php echo ($_SESSION['home']['counttopic9']); ?>) </a></li>
        </ul>
        
    </div>
</div>
<script type="text/javascript">
(function($) {
$.expr[":"].Contains = function(a, i, m) {
    return (a.textContent || a.innerText || "").toUpperCase().indexOf(m[3].toUpperCase()) >= 0;
};
function filterList(header, list) {
    //@header 头部元素
    //@list 无需列表
    //创建一个搜素表单
    var form = $("<form>").attr({
        "class":"filterform",
        action:"#"
    }), input = $("<input>").attr({
        "class":"filterinput",
        type:"text"
    });
    $(form).append(input).appendTo(header);
    $(input).change(function() {
        var filter = $(this).val();
        if (filter) {
            $matches = $(list).find("a:Contains(" + filter + ")").parent();
            $("li", list).not($matches).slideUp();
            $matches.slideDown();
        } else {
            $(list).find("li").slideDown();
        }
        return false;
    }).keyup(function() {
        $(this).change();
    });
}
$(function() {
    filterList($("#form"), $("#demo-list"));
});
})(jQuery); 
</script>
</div>
<!-- 左边侧列表导航栏结束 -->

<script type="text/javascript">

    //前端Ajax持续调用服务端，称为Ajax轮询技术

    var getting = {
        url:"<?php echo U('Index/newmsg');?>",

        dataType:'json',

        success:function(res) {

        console.log(res);
        var newmsg = document.getElementById('newmsg');

        if (res['comment'] != 0 || res['at'] !=0 || res['chat'] !=0){
            newmsg.style.display = "block";
            var str = "";
            //存在新评论
            if (res['comment'] != 0) {
                str += "<a href='<?php echo U('Show/index');?>' >你有" + res['comment'] +"条新评论</a><br/><br/>";
            }
            //存在新AT
            if (res['at'] != 0) {
                str += "<a href='<?php echo U('At/index');?>' >你有" + res['at'] +"条新AT</a><br/><br/>";
            }
            //存在新私信
            if (res['chat'] != 0) {
                str += "<a href='<?php echo U('Sx/index');?>'>你有" + res['chat'] +"条新私信</a><br/><br/>";
            }  
            $('#new').html(str);
        }

    }
  };
  window.setTimeout(function(){$.ajax(getting)},500);
  window.setInterval(function(){$.ajax(getting)},3000);

</script>
<link href="/NO2V2/Public/styles/global.css" type="text/css" rel="stylesheet">
<link href="/NO2V2/Public/styles/friend maneger.css" type="text/css" rel="stylesheet">
  <!-- 页面主体 -->
  <div id="banner">
    <table width="765" border="0" cellpadding="0" cellspacing="0" id="tb1">
      <tr>
        <td width="21" rowspan="7" class="td1"></td>
        <td height="60" align="center" valign="middle" bgcolor="#FFFFFF" class="td2">
        <!-- 插入图片 -->
        <img src="/NO2V2/Public/Uploads/<?php echo ($info['picname']); ?>" width="90" height="90" alt="" />
        </td>
        <td height="60" class="td3"><font color="#000000" size="3"><b>关注用户数量（<?php echo ($count); ?>）</b></font></td>
        <td rowspan="7" class="td1 height"></td>
      </tr>
      <tr>
        <td height="47" align="center" valign="middle" bgcolor="#e3f1fa" class="td2 font1">详细</td>
        <td height="45" align="center" valign="middle" bgcolor="#e3f1fa" class="td4 font1"> 列表
        <form id="form2" name="form2" method="post" action="<?php echo U('Person/sou');?>">
        <div id="search">
          <input type="text" name="nickname" id="textfield2" />
          <!-- <img src="/NO2V2/Public/images/sousuo1.gif" alt="" width="27" height="25" align="absmiddle" /> -->
          <input type="submit" value="搜索" style="background-color: #3295E6;width:70px;height: 30px;" />
        </div>
        </form></td>
      </tr>
      <?php if(is_array($userinfo)): foreach($userinfo as $key=>$val): ?><tr>
        <td height="105" align="center" valign="middle" class="td2">
          <div style="overflow:hidden;border-radius:50px;width:80px;height:80px;">
             <img src="/NO2V2/Public/Uploads/<?php echo ($val['picname']); ?>" width="90" height="90" alt="" />
          </div>
       </td>
        <td height="105" align="left" valign="center" class="td3"><font color="#005dc3" size="3" face="微软小黑"><b><a href="<?php echo U('Person/index',array('id'=>$val['id']));?>"><?php echo ($val["nickname"]); ?></a></b></font>
        <br /><font color="#000000" size="2">个性签名:</font>
        <br /><font color="#000000" size="2"><?php echo ($val["sign"]); ?></font>
       
       <div id="focus1"><img src="/NO2V2/Public/images/ok.png" alt="" width="16" height="16" align="texttop" /> 已关注<a href="<?php echo U('person/qxgz',array('id'=>$val['id']));?>">取消关注</a></div></td>
      </tr><?php endforeach; endif; ?>
      
          <tr>
            <td height="35" class="td2"></td>
            <td height="35" class="td3"><?php echo ($pageButton); ?></td>
          </tr>
               

    </table>
    <table width="200" border="0" cellpadding="0" cellspacing="0" id="tb2">
      <tr>

        <td height="65" align="left" class="font2">
            <!-- 关注页面用户头像 -->
              <div id="mainRightPostionFirstLineIcon" style="overflow:hidden;border-radius:50px;width:80px;height:80px;">
                    <a href="<?php echo U('person/index',array('id'=>$info['id']));?>"><img src="/NO2V2/Public/Uploads/<?php echo ($info["picname"]); ?>" alt="" width="90" height="90" align="absmiddle" title="" border="0" /></a>
              </div>　　
                    <a href="<?php echo U('person/index',array('id'=>$info['id']));?>"><?php echo ($info["nickname"]); ?></a>
        <br />个性签名:<?php echo ($info["sign"]); ?></td>
      </tr>
      <tr>
        <td height="60" width="120" class="font2"><br /><font color="black" size="3" face="微软小黑"><b>　　<?php echo ($wbcount); ?>  &nbsp;<?php echo ($count); ?>   &nbsp;<?php echo ($fscount); ?></b></font>
        <br />
        　　<font color="#005dc3"> <a href="<?php echo U('Person/index',array('id'=>$info['id']));?>">微博</a>&nbsp; <a href="<?php echo U('Person/gz',array('id'=>$info['id']));?>">关注</a>  <a href="<?php echo U('Person/fs',array('id'=>$info['id']));?>">粉丝</a></font></td>
      </tr>

      <tr>
        <td height="30" align="left" valign="top">
        <br/>
        &nbsp;&nbsp;&nbsp;<font color="#666666" size="3"><a href="<?php echo U('Topic/look');?>">我关注的话题</a></font></td>
      </tr>
      <tr>
        <td height="50" align="left" valign="top">
        <br /> 
        &nbsp;&nbsp;&nbsp;<font color="#666666" size="3">我关注的</font></td>
      </tr>
      <?php if(is_array($userinfo)): foreach($userinfo as $key=>$val): ?><tr>
          <td width="100" height="70"><div style="overflow:hidden;border-radius:40px;width:50px;height:50px;">
              <img src="/NO2V2/Public/Uploads/<?php echo ($val['picname']); ?>" width="60" height="60" alt="" />
          </div><td>
         <td align:"left"><font color="#005dc3" size="2" face="微软小黑"><b><a href="<?php echo U('Person/index',array('id'=>$val['id']));?>"><?php echo ($val["nickname"]); ?></a></b></font>
        </br></td>
      </tr><?php endforeach; endif; ?>

        <tr>
         <td height="95"> 
         <br /> &nbsp;&nbsp;&nbsp;<font color="#005dc3"> 有意见请（点击）</font>
         <p> &nbsp;&nbsp;&nbsp;<font color="#005dc3"> 不良信息举报中心</font></p></td>
       </tr>
    </table>
  </div>
<!-- footer部分 -->
<div id="footer">
    	<!-- footer网站链接部分 -->
    	<div id="footerLink">
    	  <ul>
    	    <li><a href="#" class="a2">Weico网介绍</a></li>
    	    <li><a href="#" class="a2">广告服务</a></li>
    	    <li><a href="#" class="a2">API</a></li>
    	    <li><a href="#" class="a2">诚征英才</a></li>
    	    <li><a href="#" class="a2">保护隐私权</a></li>
    	    <li><a href="#" class="a2">免责条款</a></li>
    	    <li><a href="#" class="a2">法律顾问</a></li>
    	    <li><a href="#" class="a2">意见反馈</a></li>
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
<!--总容器 container结束-->
</body>
</html>