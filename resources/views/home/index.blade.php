@extends('layout.home')
<style>
    .red{
        color: red;
    }
</style>
@section('content')
      <div id='all'>
        <ul id='uls'>
            @php
            $ad = DB::table('ad')->orderBy('sort','asc')->orderBy('id','desc')->offset(0)->limit(5)->get();
            @endphp
            @foreach($ad as $kd=>$vd)
             <li><a href="{{$vd->url}}" target="_blank"><img src="{{$vd->src}}" width="1225" height="460"></a></li>
            @endforeach

        </ul>
        <ul id='dian'>
            @foreach($ad as $kd=>$vd)
            <li></li>
            @endforeach
        </ul>

    </div>
 </di

 <div class="dy14">
    <div class="dy15">
        <ul>
            <li><a href="#">乐乐OA<br/>乐乐OA</a></li>
            <li><a href="#">乐乐APP<br/>乐乐APP</a></li>
            <li><a href="#">乐乐网贷<br/>乐乐网贷</a></li>
            <li><a href="#">话费充值<br/>话费充值</a></li>
            <li><a href="#">乐乐订餐<br/>乐乐订餐</a></li>
            <li><a href="#">乐乐外包<br/>乐乐外包</a></li>
        </ul>
    </div>
    <div class="dy16">
        <ul>
            <li><a href="#"><img src="/home/img/jinghuaqi.jpg"/></a></li>
            <li><a href="#"><img src="/home/img/jinghuaqi1.jpg"/></a></li>
            <li><a href="#"><img src="/home/img/jinghuaqi2.jpg"/></a></li>
        </ul>
    </div>
</div>
<!--一个推荐商品的轮播-->
<div class="kongzhianniu">
    <div class="lunbobanner">
        <ul class="lunboimg">
            <li>
            @foreach($goods as $vg)
            @if($vg->gtype == '1' || $vg->gtype == '2')
                <a href="/home/xq/{{$vg->id}}">
                    <b><img src="{{$vg->gimg}}" style="width: 200px;height: 200px;" /></b>
                        <p>{{$vg->gname}}</p>
                        <p>带给你极致科技</p>
                        <span style="color: red;">￥{{$vg->price}}元</span>
                </a>
            @endif
            @endforeach
            </li>
        </ul>
    </div>
    <div class="btnl"><</div>
    <div class="btnr">></div>
    <h4 class="guanfangremai">官方热卖</h4>
</div>
<!--其它商品-->
<div class="dy17">
    <!--服装鞋包-->
@foreach ($cate as $kc=>$vc)
    <div class="dy18" id="a.{{$kc}}">
    
        <div class="dy20">
            <h3>{{$vc->cate_name}}</h3>
            <div class="xxddh">
                @foreach($erca as $ve)
                @if($ve->pid == $vc->id)
                <h5 class="header" style="display: inline;float: right;cursor: pointer;margin: 5px;">{{$ve->cate_name}}</h5>
                @endif
                @endforeach
            </div>
        </div>
        <div class="dy21">
            <div class="dy22">
               <div class="" style="">
                   @foreach($goods as $vg)
                   @if($vg->gcate == $vc->id)
                   <a href="#"><img src="{{$vg->glarge}}" style="width:250px;" /></a>
                   @endif
                   @endforeach
               </div>
            </div>
            <div class="bigrongqi">
                <div class="pinpai b-1-dy23">
                    <ul>
                    @foreach($goods as $vg)
                    @if($vg->gcate == $vc->id)
                        <li>
                            <a href="/home/xq/{{$vg->id}}">
                                <img src="{{$vg->gimg}}" style="width: 200px;height: 200px;" />
                                <p>{{$vg->gname}}</p>
                                <span>现价￥{{$vg->price}}元</span>
                            </a>
                        </li>
                    @endif
                    @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endforeach
    <!--快速导航菜单-->
    <div class="dy19">
        @foreach($cate as $kc=>$vc)
        <a href="#a.{{$kc}}">{{$vc->cate_name}}</a>
        
        @endforeach

    </div>
</div>

@stop

@section('myJs')
<script type="text/javascript">
$(function() {
$(window).scroll(function() {
var top = $(window).scrollTop()-$(this).scrollTop()+200

$(".dy19").css({top: top });
});
});
    var ins = 1;

        var into = null;
        //定时器 是让图片循环起来
        function moves(){
            into = setInterval(function(){

                shows(ins++);
                if(ins > 5){

                    ins = 0;
                }


            },3000)

        }
        moves()

        //这个函数是让第一张图片显示出来的
        function shows(i){

            $('#uls li').eq(i).fadeIn(500).siblings().fadeOut(500);

            $('#dian li').eq(i).addClass('cur');
            $('#dian li').eq(i).siblings().removeClass('cur');
        }

        shows(0)

        //鼠标移上去
        $('#dian li').hover(function(){

            //获取索引
            ins = $(this).index();
            //让相应的图片显示出来
            shows(ins++);
            //停止定时器
            clearInterval(into);


        },function(){
            //鼠标离开
            //让定时器继续走
            moves();
            if(ins > 5){

                ins = 0;
            }
        })
</script>
<script type="text/javascript">
$(function() {
$(window).scroll(function() {
var top = $(window).scrollTop()-$(this).scrollTop()+200

$(".dy19").css({top: top });
});
});
</script>

<script>
    $('#big_banner_wrap').css('display','block');
</script>

<script>
    $('.content').hide();
    $('.header').hover(function(){
        $(this).addClass("red");
        $('.pinpai b-1-dy23').hide();
        $('.content').show();
    },function(){
        $(this).removeClass("red");
        $('.pinpai b-1-dy23').show();
        $('.content').hide();
    })
</script>
@stop