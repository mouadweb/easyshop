@extends('layout.home')
<link rel="stylesheet" type="text/css" href="/home/css/shangpingoumai.css">
@section('content')
</div>
<div class="tijiaozhifu">
	<!--标题-->
	<div class="zhifutt">
    	<span>支付提交</span>
        <span>请您及时付款，以便订单尽快处理！ 在线支付金额：<s style=" color:#f00">￥6666.00</s></span>
    </div>
    <!--导航列表-->
    <div class="titijj">
    	<span style=" width:290px">订单号</span>
        <span style="width:290px">支付方式</span>
        <span style="width:290px">金额</span>
        <span style="width:290px">物流</span>
    </div>
    <!--各个订单列表-->
    <div class="titijj">
    	<span style=" width:290px; color:#999">8000000000009101</span>
        <span style="width:290px; color:#999">在线支付</span>
        <span style="width:290px; color:#999">￥6666.00 ( 预存款已支付：￥35.00 )</span>
        <span style="width:290px; color:#999">快递</span>
    </div>

    <!--选择支付方式-->
    <div class="xzbsni">
    	<ul>
        	<li>
            	<img src="/home/img/alipay_logo.gif"/>
            </li>
            <li>
            	<img src="/home/img/alipay_logo.gif"/>
            </li>
            <li>
            	<img src="/home/img/alipay_logo.gif"/>
            </li>
        </ul>
    </div>
</div>
<!--确认提交并支付-->
    <a href="#" style="display:block; padding-left:20px; padding-right:20px; line-height:40px; font-size:14px" class="animaa">确认提交并支付</a>
<script>
$(function(){
	$(".xzbsni ul li").click(function(){
		$(this).addClass("plok").siblings().removeClass("plok")
		})
	})
</script>
@stop
@section('myJs')
<!-- 全局 -->
<script src="/homes/bootstrap/js/bootstrap.min.js"></script>
<script src="/home/js/jquery-1.8.3.min.js"></script>
<script src="/home/js/public.js"></script>
<!-- 下拉商品分类 -->
<!-- 下拉商品分类 -->
<script>
    $('#big_banner_wrap').css('position','absolute');
    $('#big_banner_wrap').css('top','177px');
    $('#big_banner_wrap').css('left','50%');
    $('#big_banner_wrap').css('margin-left','-613px');
</script>
<script>
$(function(){
    $("#banner_menu_wrap").mouseleave(function(){
        $(this).hide()
        $("#big_banner_wrap").hide()
        });
    $(".djfl").mouseenter(function(){
        $("#big_banner_wrap").show()
        $("#banner_menu_wrap").show()
        }); 
    })
</script>

@stop  