<?php if (!defined('THINK_PATH')) exit();?> <!--导入 头部文件-->
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
 <!--导入配置文件-->
<link href="/NO2V2/Public/styles/CustomerIndex.css" type="text/css" rel="stylesheet" />
<link href="/NO2V2/Public/styles/global.css" type="text/css" rel="stylesheet" />
<script language="javascript" src="/NO2V2/Public/script/CustomerIndex.js" ></script>
<script language="javascript" src="/NO2V2/Public/script/trim.js" ></script>
<script language="javascript" src="/NO2V2/Public/script/jquery-1.6.2.min.js"></script>
    <!-- 内容总容器 mainDIV 开 始-->
   <div id="main">
        <!-- 左侧mainBannerDIV 开始 -->
    <div id="mainBanner">
        	<!-- mainBannerTop DIV 开始 -->
      <div id="mainBannerTop">
            <!--id=mainBannerTopIssue 发布框-->
        <div id="mainBannerTopIssue">
          <!--id=mainBannerTopIssuePoint 提示-->
          <?php if($userinfo['nickname'] != null): ?><div id="mainBannerTopIssuePoint">给<a href="<?php echo U('Person/index',array('id'=>$userinfo['id']));?>"><?php echo ($userinfo["nickname"]); ?></a>发私信
          <?php else: ?> <div id="mainBannerTopIssuePoint">当前暂无收信人<?php endif; ?>
         
          </div>
          <div style="float:right;">您还可以输入<font id="counter1">140</font>字！
          </div>
          <form action="<?php echo U('Sx/index');?>" method="post" enctype="multipart/form-data">
          <div id="mainBannerTopIssueForm">
                  <!--id="mainBannerTopIssueFrame-->
          <div id="mainBannerTopIssueFrame">
          <textarea name="text" rows="4" class="Size" id="textfield2" maxlength="140" style="overflow:hidden;border:1px #0CF solid;resize:none;" onkeyup="check(this)"></textarea>
          <script>
            var counter1 = document.getElementById('counter1');
            var num = 140;
            function check(obj){
              var msg = obj.value;
              counter1.innerHTML = num - msg.length;
            }
          </script>
          <input type="hidden" name="getid" value="<?php echo ($userinfo["id"]); ?>"></input>
          <input type="hidden" name="getnickname" value="<?php echo ($userinfo["nickname"]); ?>">
                    <div id="mainBannerTopIssueInsert1">
                        <input style="opacity: 0" type="file" id="inputEmail" name="picname">
                    </div>
                     &nbsp;<div id="mainBannerTopIssueInsert2">插入图片</div>
                     
          </div>
                  <!--id="mainBannerTopIssueInsert 插入链接-->
              <div id="mainBannerTopIssueInsert">
                  <!--4个小div-->
              </div>
                <!--确认发布-->
              <div id="mainBannerTopIssueSure">
                <div id="mainBannerTopIssueSure2">
                  <input type="submit" value="发送" style="background-color: #3295E6;width:70px;height: 30px;">
                </div>
              </div>
              </div>
          </form>
          </div>
        </div>
            <!--id="mainBannerTitle 首页-->
            <div id="mainBannerTitle">
                <!--id="mainBannerTitleWord"-->
                <div id="mainBannerTitleWord"><b>私信我的</b>
                </div>
                <!--首页提示与隐藏-->
                <div id="mainBannerTitleWord2">
                        <input type="checkbox" name="checkbox" id="checkbox" onclick="tdImgState()"/>
                        隐藏图片 
                </div>
            </div> 
            <!--不同人的内容-->
        <div id="mainBannerContent">
            <!--个人展示-->
            	<div class="stateShow" onmouseover="stateMouseOver(this)" onmouseout="stateMouseOut(this)">
                <div class="stateShowWord">
                  
                </div>
                <div class="stateImgShow">
                  
                </div>  
                
                <br/> <br/>
                <div id="mainBannerContent2PeopleWordBack">
                   <table width="200" border="0" cellpadding="0" cellspacing="0">
                    <?php if($chatlist == null): ?><font style="font-size: 20px;color:purple;">还没有人私信我哦！</font><?php endif; ?>
                   <?php if(is_array($chatlist)): foreach($chatlist as $k=>$val): ?><tr>
                        <td>
                          <img src="/NO2V2/Public/Uploads/<?php echo ($val['sendpicname']); ?>" width="40" height="40" alt="">
                        <a href="<?php echo U('Person/index',array('id'=>$val['sendid']));?>" class="a1"><?php echo ($val["sendnickname"]); ?></a>&nbsp;说：
                        </td>
                      </tr>
                      <tr></tr>
                      <tr></tr>
                      <tr>
                         <td>
                            <div style="width:500px;overflow:hidden;">
                               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($val["text"]); ?>
                                <?php if($val['picname'] != 'null.jpg'): ?><div class="small" style="width:200px;height:200px"><img src="/NO2V2/Public/Uploads/<?php echo ($val['picname']); ?>" width="200" height="220" alt=""></div><img src="/NO2V2/Public/Uploads/<?php echo ($val['picname']); ?>" class="big" height="400" alt="">
                                  
                                  </else><?php endif; ?>
                            </div>
                        </td>
                      </tr>
                      <tr>
                        <td><span style="color:#ccc">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;发表于 <?php echo ($val["time"]); ?></span></td>
                      </tr><?php endforeach; endif; ?>
                      <tr>
                        <td><?php echo ($pageButton); ?></td>
                      </tr>
                    </table>

                    
              </div>
              </div>
              <br/>
            <!--个人展示结束-->
     
        </div>
      </div>
      <!-- 左侧mainBanner DIV 结束-->
      
      <script type="text/javascript">
           
           
           $('.small').mouseover(function(){

            var offset = $(this).offset(); 
            $(this).next().css('top',(offset.top-400)).css('left',(offset.left-100)).css('display','block');
             
           });
           $('.small').mouseout(function(){
            $(this).next().css('display','none');
           });
           
        </script>

      <!-- 导入右侧 侧边栏-->
      <!-- 右侧mainRight DIV开始 -->
  <div id="mainRight">
          <table width="200" border="0" cellpadding="0" cellspacing="0" bgcolor="#E9F4FA">
 				<tr>
                    <td bgcolor="#E9F4FA">
                    	<!-- 右侧mainRightPostionFirstLine DIV 开始 -->
                    	<div id="mainRightPostionFirstLine"><br/>
                            <!-- 右侧mainRightPostionFirstLineIcon DIV 开始 -->
                            <div style="height:58px;">
                            <div id="mainRightPostionFirstLineIcon">
                             <!-- <font> sfd</font> -->
                            	<a href="<?php echo U('Person/index',array('id'=>$_SESSION['home']['id']));?>"><img src="/NO2V2/Public/Uploads/<?php echo ($_SESSION['home']['picname']); ?>" alt="" width="48" height="48" align="absmiddle" title="" border="0" /></a>
                            </div >
                            <!-- 右侧mainRightPostionFirstLineIcon DIV 结束 -->
                            <!-- 右侧mainRightPostionFirstLineWord1 DIV 开始 -->
                            <div id="mainRightPostionFirstLineWord1">                 
                            &nbsp;<font color="#005DC3" ><b><a href="<?php echo U('Person/index',array('id'=>$_SESSION['home']['id']));?>" class="a1"><?php echo ($_SESSION['home']['nickname']); ?></a></b></font><br /><br/>
                            个性签名：<?php echo ($_SESSION['home']['sign']); ?>
                            </div>
                            </div>
                            <!-- 右侧mainRightPostionFirstLineWord1 DIV 结束 -->
                        	<!-- 右侧mainRightPostionFirstLineWord2 DIV 开始 -->
                          <div id="mainRightPostionFirstLineWord2">
                          <br/>
                                <ul>
                                	<a href="<?php echo U('Person/index');?>" class="a1"><li><font class="style1"> <?php echo ($_SESSION['home']['textnum']); ?></font><br /><font class="style2">微博</font></li></a>
   								    <a href="<?php echo U('Person/gz');?>" class="a1"><li><font class="style1">       &nbsp;<?php echo ($_SESSION['home']['gznum']); ?></font><br /><font class="style2">关注</font></li></a>
   								    <a href="<?php echo U('Person/fs');?>" class="a1"><li><font class="style1">&nbsp;<?php echo ($_SESSION['home']['fsnum']); ?></font><br /><font class="style2">粉丝</font></li></a>
                                </ul>
                           </div>
                           <!-- 右侧mainRightPostionFirstLineWord2 DIV 结束 -->                    
                        </div>
                        <!-- 右侧mainRightPostionFirstLine DIV 结束 -->
                    </td>
                </tr>
                <tr>
                    <td bgcolor="#E9F4FA">                    
                        <!-- 右侧mainRightPostionSecondLine DIV 开始 -->
                        <div id="mainRightPostionSecondLine">
                            <!-- 右侧mainRightPositionSecondLineContent DIV 开始 -->
                            <div id="mainRightPositionSecondLineContent">
                                <!-- <a href="#" class="a1"><font style="font-size:16px;font-weight:700; color:#000;">首页</font></a><br /> -->
                                <hr color="#79BDD1" zize="2" style="" />
                                <a href="<?php echo U('At/index');?>" class="a1"><font class="style3">提到我的</font></a>
                                <hr class="h1">
                                <a href="<?php echo U('show/index');?>" class="a1"><font class="style3">我的评论</font></a>
                                <hr class="h1">
                                <a href="<?php echo U('Sx/index');?>" class="a1"><font class="style3">私信我的</font></a><a href="<?php echo U('Sx/look');?>" class="a1"><font class="style3">(我的私信)</font></a>
                                <hr class="h1">
                                <a href="<?php echo U('Collect/index');?>" class="a1"><font class="style3">我的收藏</font></a>
                                <hr class="h1">
                                <a href="<?php echo U('Topic/choose');?>" class="a1"><font class="style3">选择兴趣话题</font></a>
                            </div>
                            <!-- 右侧mainRightPositionSecondLineContent DIV 开始 -->
                        </div>
                        <!-- 右侧mainRightPostionSecondLine DIV 结束 -->
                    </td>
                </tr>
                <tr>
                  <td>  
                        <!-- 右侧mainRightPostionThirdLine DIV 开始 -->
                        <div id="mainRightPostionThirdLine">
                            <!-- 右侧mainRightPositionThirdLineContent DIV 开始 -->
                            <div id="mainRightPositionThirdLineContent">
                            <!-- <p><a href="#" onclick="" class="a1"><font class="style4">你可能感兴趣的人</font>
                            <img src="/NO2V2/Public/images/ThirdLineUpArrow.gif" alt="" width="12" height="14" align="right" title="" border="0"/></a></p>
                            <br />
                            <div id="d32" style="float:right"><a href="#" class="a1">查看更多</a></div> -->
                            <a href="http:\\www.weibo.com"><img src="/NO2V2/Public/images/adc.jpg" alt="" width="200" height="100" style="margin-left: -15px;margin-top: -10px;"></a>
                            </div>                    	
                            <!-- 右侧mainRightPositionThirdLineContent DIV 结束 -->	
                        </div>
                        <!-- 右侧mainRightPostionThirdLine DIV 开始 -->
                  </td>
                </tr>
                <tr>
                    <td>
                        <!-- 右侧mainRightPostionFourthLine DIV 开始 -->
                        <div id="mainRightPostionFouthLine">
                        	<!-- 右侧mainRightPositionThirdLineContent DIV 结束 -->	
                        	<div id="mainRightPositionFourthLineContent">
                            <form action="<?php echo U('Topic/index');?>" method="post">
                              <input type="text" name="topic" id="textfield1"/><input type="submit" value="搜索" />
                              
                            </form>
                            <a href="<?php echo U('Topic/show');?>" onclick="" class="a1"><font class="style4" style="color:purple;">热门话题传送门</font>
                            <img src="/NO2V2/Public/images/ThirdLineUpArrow.gif" alt="" width="12" height="14" align="right" title="" border="0"/></a>
                            <ul id="ul2" style="line-height:25px;">
                            	<a href="<?php echo U('Topic/index',array('topic'=>'明星'));?>" class="a1"><li><font class="style2">明星(<?php echo ($_SESSION['home']['counttopic']); ?>)</font></li></a>

                                <a href="<?php echo U('Topic/index',array('topic'=>'娱乐'));?>" class="a1"><li><font class="style2">八卦娱乐(<?php echo ($_SESSION['home']['counttopic1']); ?>)</font></li></a>

                                <a href="<?php echo U('Topic/index',array('topic'=>'维多利亚'));?>" class="a1"><li><font class="style2">维密秀(<?php echo ($_SESSION['home']['counttopic11']); ?>)</font></li></a>

                                <a href="<?php echo U('Topic/index',array('topic'=>'汽车'));?>" class="a1"><li><font class="style2">汽车(<?php echo ($_SESSION['home']['counttopic2']); ?>)</font></li></a>

                                <a href="<?php echo U('Topic/index',array('topic'=>'医学'));?>" class="a1"><li><font class="style2">医学(<?php echo ($_SESSION['home']['counttopic3']); ?>)</font></li></a>

                                <a href="<?php echo U('Topic/index',array('topic'=>'搞笑'));?>" class="a1"><li><font class="style2">搞笑(<?php echo ($_SESSION['home']['counttopic4']); ?>)</font></li></a>

                                <a href="<?php echo U('Topic/index',array('topic'=>'时尚穿搭'));?>" class="a1"><li><font class="style2">时尚穿搭(<?php echo ($_SESSION['home']['counttopic7']); ?></font>)</li></a>

                                <a href="<?php echo U('Topic/index',array('topic'=>'川普'));?>" class="a1"><li><font class="style2">川普(<?php echo ($_SESSION['home']['counttopic6']); ?>)</font></li></a>

                                <a href="<?php echo U('Topic/index',array('topic'=>'职场'));?>" class="a1"><li><font class="style2">职场(<?php echo ($_SESSION['home']['counttopic8']); ?>)</font></li></a>

                                <a href="<?php echo U('Topic/index',array('topic'=>'电影'));?>" class="a1"><li><font class="style2">电影(<?php echo ($_SESSION['home']['counttopic9']); ?>)</font></li></a>
                            </ul>
                            </div>
                            <!-- 右侧mainRightPositionThirdLineContent DIV 结束 -->	
                        </div>
                        <!-- 右侧mainRightPostionFoutrhLine DIV 结束 -->
                    </td>
                </tr>
                <tr>
                    <td><!-- 右侧mainRightPostionSeventhLine DIV 开始 -->
                    <a href="http:\\www.weibo.com"><img src="/NO2V2/Public/images/weigao.jpg" width="200" alt=""></a>
                    <div id="mainRightPostionSeventhLine">
                        <div id="mainRightPositionSevenLineContent">
                        Weico微博的成长，离不开你。<br />
                        <font class="style2"><a href="#" class="a1">有意见要提（点击） </a><br /><br />
                        <a href="#" class="a1" onclick="set()" >不良信息举报中心</a></font> 
                        </div>
                    </div>
                    <!-- 右侧mainRightPostionSeventhLine DIV 结束 -->
                    </td>
                </tr>
          </table>
     </div>
      <!-- 右侧mainRightDiv 结束 -->
  </div>
    <!-- 内容总容器 mainDIV 结束-->

<!-- 导入footer部分 -->
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