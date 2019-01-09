@extends('layout.home')

<link rel="stylesheet" type="text/css" href="/home/css/top.css"/>
<link rel="stylesheet" type="text/css" href="/home/css/lunbo.css">
<link rel="stylesheet" type="text/css" href="/home/css/zhanshi.css">
<link rel="stylesheet" type="text/css" href="/home/css/footer.css">
@section('css')
<link rel="stylesheet" href="/homes/common/css/exchange/index.min.css" />
<link rel="stylesheet" href="/homes/common/css/exchange/serviceList.min.css" />
<style type="text/css">
    #father{
        float: left;

    }
  .xm-service-box{

    width: 1200;
  }
  #content{
      height: 150px;
  }
</style>
@show
@section('content')
</div>
<div class="nowweizhi">


    <a href="/">首页</a>
    <b>></b>
    <a href="#">{{$rsone->cate_name}}</a>
    <b>></b>
    <a href="/notice/article/{{$resone->id}}">{{$resone->title}}</a>
</div>
<center>
<div class="xm-service-box">
    <!-- 服务支持面包屑 -->
    <div class="container clearfix">
        <div class="row">
            <!-- 左侧菜单列表 -->
            <div class="span4" id="father">
                <div class="xm-service-sidebar">
                    <div class="content">
                        <div class="xm-sidebar-content" id="content">
                            <div class="nav-list" id="serviceMenuList">
                                <h3>{{$rsone->cate_name}}</h3>
                                <ul class="uc-nav-list">
                                @foreach($noticeone as $kr=>$vr)
                                        @if($vr->cid == $rsone->id)
                                        <li @if($vr->id==$resone->cate_id) class="cur" @endif>
                                             <a href="/notice/article/{{$vr->id}}" >{{$vr->cate_name}}</a>
                                        </li>
                                        @endif
                                @endforeach
                                </ul>
                                <span class="line"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="span16" id="son">
                <div class="content" id="serviceListCon">
                <style>
                .service-right img{max-width: 856px;}
                </style>
                    <div class="service-right">
                        <div class="service-right-section">
                            {!!$resone->content!!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</center>
<!--商品展示区域-->
@stop
@section('myJs')
<!-- 全局 -->
<script src="/home/js/jquery-1.8.3.min.js"></script>
<script src="/home/js/public.js"></script>
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