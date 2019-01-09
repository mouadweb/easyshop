<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <title>用户登录</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="Keywords" content="网站关键词">
    <meta name="Description" content="网站介绍">
    <link rel="stylesheet" href="/login/css/base.css">
    <link rel="stylesheet" href="/login/css/iconfont.css">
    <link rel="stylesheet" href="/login/css/reg.css">
</head>
<body>
<div id="ajax-hook"></div>
<div class="wrap">
    <div class="wpn">
        <div class="form-data pos">
            <a href=""><img src="/login/img/logo.png" class="head-logo"></a>
            <div class="change-login">
                <p class="account_number on">修改密码</p>
            </div>
            <form action="/home/xapass" method="post">
            <div class="form1">
                <p class="p-input pos">
                    <label for="num">修改密码</label>
                    <input type="password" id="num" name="xpass">

                    <span class="tel-warn num-err hide"><em></em><i class="icon-warn"></i></span>

                </p>
                <p class="p-input pos">
                    <label for="pass">确认密码</label>
                    <input type="password" style="display:none"/>
                    <input type="password" id="pass" autocomplete="new-password" name="rpass">
                    @if(session('error'))
                    <span class="tel-warn pass-err"><em>{{session('error')}}</em><i class="icon-warn"></i></span>
                    @endif
                </p>
                <p class="p-input pos code hide">
                    <label for="veri">请输入验证码</label>
                    <input type="text" id="veri" name="code">
                    <img src="">
                    <span class="tel-warn img-err hide"><em>账号或密码错误，请重新输入</em><i class="icon-warn"></i></span>
                    <!-- <a href="javascript:;">换一换</a> -->
                </p>

            </div>

            <div class="r-forget cl">
                <a href="/home/register" class="z">账号注册</a>

            </div>
            {{csrf_field()}}
            <button class="lang-btn off log-btn">确认</button>
            <div class="third-party">
                <a href="#" class="log-qq icon-qq-round"></a>
                <a href="#" class="log-qq icon-weixin"></a>
                <a href="#" class="log-qq icon-sina1"></a>
            </div>
            <p class="right">Powered by © 2018</p>
        </div>
    </form>
    </div>
</div>
<script src="/login/js/jquery.js"></script>
<script src="/login/js/agree.js"></script>
<script src="/login/js/login.js"></script>
</body>
</html>