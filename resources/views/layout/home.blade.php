<!doctype html>
<html>
<head>
<meta charset="utf-8">
@php
    $conf= DB::table('conf')->first();
@endphp
<meta name="keyword" content="{{$conf->keyword}}">
<meta name="desc" content="{{$conf->desc}}">
<title>@yield('title'){{$conf->title}}</title>
@section('css')
<link rel="stylesheet" type="text/css" href="/home/css/index.css">
<link rel="stylesheet" type="text/css" href="/home/css/lunbo.css">
<style type="text/css">
    #links li{
        padding:0px;
        float: left;
        position: center;
    }
    *{margin:0px;padding:0px;list-style:none;}

        #all{
            width:1225px;
            height: 460px;

            position:absolute;
        }
        #uls li{
            position:absolute;
        }

        #dian{
            background-color: rgba(255, 255, 255, 0.3);
            border-radius: 10px;
            bottom: 15px;
            font-size: 0;
            height: 13px;
            left: 50%;
            margin-left: -39px;
            position: absolute;
            text-align: center;
        }

        #dian li{
            background: #fff none repeat scroll 0 0;
            border-radius: 50%;
            /*display: block;*/
            height: 0;
            padding-top: 8px;
            width: 8px;
            display: inline-block;
            margin: 3px;
            cursor:pointer;
        }

        #dian .cur{
            background: #ff5000 none repeat scroll 0 0;
        }

</style>
@show

@section('js')
<script src="/home/js/jquery-1.8.3.min.js"></script>

<script src="/home/js/public.js"></script>
@show
</head>

@php
  if($conf->status == 1){
@endphp
<body>
<!--顶部菜单-->
<div class="dy1">
    <div class="dy2">
        <ul class="dy3">
            <li><a href="#">乐乐官网<br/>乐乐官网</a></li>
            <li><a href="#" id="diyunapp">商城APP<br/>商城APP</a></li>
        </ul>
        <a href="/home/cart/index" class="dy5">购物车</a>
        <?php if(!session('sid')){?>
        <ul class="dy4">
            <li><a href="/home/login">登录<br/>登录</a></li>
            <li><a href="/home/register">注册<br/>注册</a></li>
        </ul>
        <?php
                }else{


                    $users = DB::table('user')->where('id',session('sid'))->first();
        ?>
        <ul class="dy4">
            <li><a href="#">{{$users->username}}<br/>{{$users->username}}</a></li>
            <li><a href="/home/person">个人中心<br/>个人中心</a></li>
            <li><a href="/home/out">退出登录<br/>退出登录</a></li>
        </ul>
        <?php } ?>
         <div class="dy9">
            <img src="/home/img/phone.png"/>
         </div>
    </div>
</div>
<!--logo加时间加搜索框-->
<div class="dy10">
    <div class="dy11">
        <img src="{{$conf->logo}}" style="width: 364px;height: 60" />
     
        
    </div>
    <div class="dy12">
        <form action="/home/list" method="get">
            <input type="text" name="gname" placeholder="商品名称" style="width:500px; height:36px; text-indent:12px; font-size:12px; color:#666; float:left" />
            <input type="submit" value="查询" style=" cursor:pointer; width:70px; height:36px; float:right; text-align:center; background:#333;color: white;" />
        </form>
    </div>
</div>
<!--全部商品分类-->
<div class="qbspfl">
    <div class="djfl">
        全部商品分类
    </div>
    @php
        $goodstype = DB::table('goods_type')->get();
    @endphp
    <div class="morelist">
        @foreach($goodstype as $kt=>$vt)
        <a href="/home/goodstype/{{$vt->id}}">{{$vt->type_name}}</a>
        @endforeach
    </div>
</div>

<!--banner轮播引入lunbo.css和daohang.js-->

<div id="big_banner_wrap" >
        @php
            $list = DB::table('goods_category')->where('pid','=',0)->where('status','=',1)->get();
            $son = DB::table('goods_category')->where('pid','>',0)->where('status','=',1)->get();
        @endphp
     <ul id="banner_menu_wrap">
        @foreach($list as $klist =>$vlist)


         <li @if($klist==0) class="active" @endif>
              <a href="/home/goodsfather/{{$vlist->id}}">{{$vlist->cate_name}}</a>
             <a class="banner_menu_i">&gt;</a>
             <div class="banner_menu_content" style="width: 600px; top:{{-20-$klist*42}}px;">
                 <ul class="banner_menu_content_ul">
                    @foreach($son as $kson=>$vson)
                    @if($vlist->id == $vson->pid)
                     <li>
                        <a>{{$vson->cate_name}}</a><a href="/home/goodsson/{{$vson->id}}" target="_blank"><span>选购</span></a>
                     </li>
                     @endif
                     @endforeach
                 </ul>
             </div>
         </li>
         @endforeach
     </ul>

 <script src="/home/js/daohang.js"></script>

@section('content')

@show
        @php
            $noticecate = DB::table('notice_cate')->where('cid','=',0)->where('status','=',1)->get();
            $notice = DB::table('notice_cate')->where('status','=',1)->where('cid','>',0)->get();
        @endphp
 <div class="footer">

    <div class="box" style=" width:1226px; margin:0 auto">
        <center>
        <ul class="lian">
        @foreach($noticecate as $k=>$v)
            <li>
                <p><img src="/home/img/fot{{$k+1}}.png">{{$v->cate_name}}</p>
                 @foreach($notice as $kk=>$vv)
                    @if($v->id == $vv->cid)
                        <a rel="nofollow" href="/notice/article/{{$vv->id}}"   target="_blank">{{$vv->cate_name}}</a>
                    @endif
                  @endforeach
            </li>
        @endforeach
        </ul>
    </center>
        <ul class="adv">
            <li><img src="/home/img/adv.png">正品保障</li>
            <li><img src="/home/img/adv1.png">免运费</li>
            <li><img src="/home/img/adv2.png">送货上门</li>
            <li style="border-right:none;"><img src="/home/img/adv3.png">实物拍摄</li>
        </ul>
        <p class="ad">地址山东省济南市历下区历山北路 &nbsp;&nbsp;&nbsp;邮箱：xgm@8and9.com.cn &nbsp;&nbsp;&nbsp;邮编:210008 &nbsp;&nbsp;&nbsp;电话:025-83218155</p>
        <p class="ad">Copyright © 2010 - 2013, 版权所有 SHUIGUO.COM &nbsp;&nbsp;&nbsp;苏ICP备10088888号-1</p>
        @php
            $links = DB::table('links')->where('status','=',1)->get();
        @endphp

        <ul id="links" class="lian">
            @foreach($links as $kl=>$vl)
            <li>
                <div class="ng-authentication">
                <a rel="nofollow" name="public0_none_wb_zs0302" target="_blank" href="{{$vl->url}}"> <img width="76" height="24" alt="诚信网站" src="{{ $vl->logo }}" /> </a>
                </div>
            </li>
            @endforeach
        </ul>

    </div>

    @section('myJs')
    @show
</div>

</body>
</html>
@php
}
else{

 echo '<img src="/uploads/timg.jpg" width="100%" height="100%">';
@endphp
@php
    }
@endphp
