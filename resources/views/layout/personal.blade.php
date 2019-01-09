<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>@yield('title')</title>
<link rel="stylesheet" type="text/css" href="/home/css/vipcenter.css">
<script src="/home/js/jquery-1.8.3.min.js"></script>
<script src="/home/js/public.js"></script>
</head>

<body>
<!--个人中心首页 -->
<div class="thetoubu">
    <!--头部-->
    @php

        $person = DB::table('user')->where('id',session('sid'))->first();

    @endphp
    <div class="thetoubu1">
        <b>
            <img src="{{$person->profile}}"/>
        </b>
        <em>{{$person->username}}</em>
        <em>欢迎来到会员中心</em>
        <a href="#">地址管理</a>
        <a href="/">回到首页</a>
        <h5>账户安全</h5>
        <strong>低</strong>
        <span>
            <p style=" width:27%"></p>
        </span>
        <a href="#">安全等级提升</a>
        <em style=" padding-right:2px">手机</em>
        <a href="#" style=" padding-left:2px; float:left; display:block; color:#f00" title="点击绑定">已绑定</a>

    </div>
    <!--详细列表-->
    <div class="xiangxilbnm">
        <!--left-->
        <div class="liefyu">
            <h2>资料管理</h2>
                <div class="conb">
                <a href="/home/person">账户信息</a>
                <a href="/home/anquan">账户安全</a>
                <a href="#">收货地址</a>
                <a href="#">我的消息</a>
                <a href="#">我的好友</a>
                <a href="#">我的足迹</a>
                <a href="#">第三方账号登录</a>
                <a href="#">分享绑定</a>
                </div>
            <h2>交易管理</h2>
                <div class="conb">
                <a href="#">我的购物车</a>
                <a href="/home/dingdan">我的订单</a>
                <a href="#">我的收藏</a>
                <a href="#">交易评价/晒单</a>
                <a href="#">账户余额</a>
                <a href="#">我的积分</a>
                <a href="#">我的代金卷</a>
                </div>
        </div>
        @section('js')
        <script type="text/javascript">
        $(function(){//第一步都得写这个
            $(".liefyu h2").click(function(){//获取title，并且让他执行下面的函数
            $(this)/*点哪个就是哪个*/.next(".conb")/*哪个标题下面的con*/.slideToggle()/*打开/折叠*/.siblings/*锁定同级元素*/(".con").slideUp()/*同级元素折叠起来*/
            })
        })
        </script>
        @show
        <!--right-->
        @section('content')


        @show
        <!--right结束-->
    </div>
    <!--详细列表结束-->
</div>
<!--个人中心结束-->

@section('myjs')

@show

</body>
</html>
