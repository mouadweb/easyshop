@extends('layout.home')

<link rel="stylesheet" type="text/css" href="css/top.css"/>
<link rel="stylesheet" type="text/css" href="css/lunbo.css">
<link rel="stylesheet" type="text/css" href="css/liebiao.css"/>
<link rel="stylesheet" type="text/css" href="css/footer.css"/>
<style>
      .pagination{
        position: absolute;
        left: 521px;
      }
      .pagination li a{
        color: #fff;
      }
        
        .pagination li{
          float: left;
          width: 30px;
          height: 35px;
          padding: 0 10px;
          display: block;
          font-size: 18px;
          line-height: 30px;
          text-align: center;
          cursor: pointer;
          outline: none;
          background-color:skyblue;
          text-decoration: none;
          border-right: 1px solid rgba(0, 0, 0, 0.5);
          border-left: 1px solid rgba(255, 255, 255, 0.15);
          box-shadow: 0px 1px 0px rgba(0, 0, 0, 0.5), inset 0px 1px 0px rgba(255, 255, 255, 0.15);

        }

        .pagination  .active{
          color: #323232;
          border: none;
          background-image: none;
          background-color: #88a9eb;
          box-shadow: inset 0px 0px 4px rgba(0, 0, 0, 0.25);
        }

        .pagination .disabled{
          color: #666666;
          cursor: default;
        }
        .pagination{
          margin:0px;
        }
        
</style>
@section('content')
</div>
<!--商品列表-->
<div class="shopliebiao">
    <ul>
        @foreach($res as $vg)
        <li>
           <a href="/home/xq/{{$vg->id}}" class="wocici">
               <b>
               <img src="{{$vg->gimg}}"/>
               </b>
               <h2>{{$vg->gname}}</h2>
               <p>极致科技</p>
               <span>￥{{$vg->price}}元</span>
           </a>
        </li>
        @endforeach
    </ul>
</div>
<br>
<div style="text-align: center;" class="dataTables_info" id="DataTables_Table_1_info">
    当前页码{{$res->currentPage()}} 从{{$res->firstItem()}} to {{$res->lastItem()}} 共{{$res->total()}}条数据

</div>
<div style="text-align: center;" class="dataTables_paginate paging_full_numbers" id="DataTables_Table_1_paginate">

    {{$res->appends($request->all())->links()}}
</div>
@stop

@section('myJs')
<script src="/home/bootstrap/js/bootstrap.min.js"></script>
<script src="js/jquery-1.8.3.min.js"></script>
<script src="js/public.js"></script>
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