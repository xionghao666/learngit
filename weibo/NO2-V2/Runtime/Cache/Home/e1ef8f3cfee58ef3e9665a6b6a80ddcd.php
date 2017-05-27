<?php if (!defined('THINK_PATH')) exit();?>﻿<html>
<!DOCTYPE html>
<html lang="en" class="no-js">

    <head>

        <meta charset="utf-8">
        <title>登录(Login)</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- CSS -->
        <link rel="stylesheet" href="/weibo/Public/assets/css/reset.css">
        <link rel="stylesheet" href="/weibo/Public/assets/css/supersized.css">
        <link rel="stylesheet" href="/weibo/Public/assets/css/style.css">

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="assets/js/html5.js"></script>
        <![endif]-->
        <style>
            body{background-image:url(/weibo/Public/assets/img/3.jpg);}
            a:link {text-decoration: none;}
            a:visited {text-decoration: none;}
            a:active {text-decoration: none;}
            a:hover {text-decoration: none;}
        </style>
    </head>

    <body>
        <div style="position:absolute;top: 50px;left: 1100px"><a href="<?php echo U('Register/index');?>">还没账号？快来注册吧</a>
        <a href="<?php echo U('Login/forget');?>">忘记密码?</a>
        </div>
        <div class="page-container">
            <h1>登录(Login)</h1>
           <form  name="myform" action="<?php echo U('index');?>" autocomplete="on" method="post" onsubmit="return doCheck()"> 
                <input type="text" name="username" class="username" placeholder="请输入您的用户名！">
                <input type="password" name="password" class="password" placeholder="请输入您的用户密码！">
                <input type="Captcha" class="Captcha" name="code" placeholder="请输入验证码！">
                <img src="<?php echo U('Login/yzm');?>" width="100" height="40" onclick="this.src=this.src+'?i='+Math.random()" style="margin-top:25px;"><b style="font-size:15px;">看不清楚？请点击</b><br/>
                <button type="submit" class="submit_button">登&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;录</button>
                <div class="error"><span>+</span></div>
            </form>

            <div class="connect">
                
                <p>
                    <a class="facebook" href="#"></a>
                    <a class="twitter" href="#"></a>
                </p>
            </div>
        </div>
        <!-- Javascript -->
        <script src="/weibo/Public/assets/js/jquery-1.8.2.min.js" ></script>
        <script src="/weibo/Public/assets/js/supersized.3.2.7.min.js" ></script>
        <script src="/weibo/Public/assets/js/supersized-init.js" ></script>
        <script src="/weibo/Public/assets/js/scripts.js" ></script>

    </body>

</html>