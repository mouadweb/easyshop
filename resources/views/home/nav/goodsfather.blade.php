@extends('layout.home')

<link rel="stylesheet" type="text/css" href="/home/css/top.css"/>
<link rel="stylesheet" type="text/css" href="/home/css/lunbo.css">
<link rel="stylesheet" type="text/css" href="/home/css/zhanshi.css">
<link rel="stylesheet" type="text/css" href="/home/css/footer.css">
<link rel="stylesheet" type="text/css" href="/home/css/liebiao.css"/>
<link rel="stylesheet" type="text/css" href="/css/app.css">

@section('content')
</div>
<div class="nowweizhi">
    <a href="/">首页</a>
    <b>></b>
    <a href="/home/goodsfather/{{$type->id}}">{{$type->cate_name}}</a>
</div>
<!--商品展示区域-->
<!--分类搜索-->
<div class="zhxlxp">
    <span style=" background:#000; color:#fff; margin-left:0;">排序方式</span>
    <a href="#">综合</a>
    <a href="#" title="7天销量降序排列">销量</a>
    <a href="#" title="上架时间降序排列">新品</a>
    <a href="#" title="销售价格降序排列">价格</a>
</div>
<!--商品列表-->
<div class="shopliebiao">
    <ul>
        @foreach($goodsfather as $kl=>$vl)
        <li>
           <a href="#" class="wocici">
               <b>
               <img src="{{$vl->gimg}}"/>
               </b>
               <p>{{$vl->gname}}</p>
               <span>{{$vl->price}}</span>
           </a>
           <em class="wocaca">
             <a href="/home/xq/{{$vl->id}}" style="width: 100%">查看详情</a>
           </em>
        @endforeach
    </ul>
</div>
      <div id="paginate" style="text-align: center;">
       {{ $goodsfather->links() }}
      </div>
<!--猜你喜欢-->
<div class="zhxlxp"><span style=" background:#111; color:#fff; margin-left:0; padding-left:10px">为你推荐</span></div>
<div class="tuijiansp">
    <div class="shopliebiao">
      <ul>
        @foreach($guess as $kg=>$vg)
        <li>
            <a href="#" class="wocici">
                <b>
                <img src="{{$vg->gimg}}"/>
                </b>
                <p>{{$vg->gname}}</p>
                <span>{{$vg->price}}</span>
            </a>
            <em class="wocaca">
              <a href="/home/xq/{{$vl->id}}" style="width: 100%">查看详情</a>
            </em>
        @endforeach
      </ul>
  </div>
</div>
@stop
@section('myJs')
<!-- 全局 -->
<script src="/homes/bootstrap/js/bootstrap.min.js"></script>
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