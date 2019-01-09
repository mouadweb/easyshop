@extends('layout.home')
    <link rel="stylesheet" href="/home/css/reset.css">
    <link rel="stylesheet" href="/home/css/carts.css">

@section('content')
</div>
    <section class="cartMain">
        <div class="cartMain_hd">
            <ul class="order_lists cartTop">
                <li class="list_chk">
                    <!--所有商品全选-->
                    <input type="checkbox" id="all" class="whole_check">
                    <label for="all"></label>
                    全选
                </li>
                <li class="list_con">商品信息</li>
                <li class="list_info">商品参数</li>
                <li class="list_price">单价</li>
                <li class="list_amount">数量</li>
                <li class="list_sum">金额</li>
                <li class="list_op">操作</li>
            </ul>
        </div> 
    <div>
        @if(!empty(session('sid')))
        <div class="cartBox">
            <div class="order_content">
            @foreach($goods as $v)  
                @if($v->uid ==session('sid'))
                <ul class="order_lists">
                    <li class="list_chk">
                        <input  type="checkbox" id="checkbox_.{{$v->id}}" class="son_check">
                        <label gidd="gidd" gid="{{$v->gid}}" suib="{{$v->id}}" for="checkbox_.{{$v->id}}"></label>
                    </li>
                    <li class="list_con">
                        <div class="list_img"><a href="javascript:;"><img src="{{$v->middle}}" alt=""></a></div>
                        <div class="list_text"><a href="javascript:;">{{$v->gname}}</a></div>
                    </li>
                    
                    <li class="list_info">

                        <p> 规格:{{$v->size}}</p>
                        
                        <p>尺寸：{{$v->gweight}}{{$v->dw}}</p>
                    </li>

                    <li class="list_price">
                        <p class="price">￥{{$v->price}}</p>
                    </li>
                    <li class="list_amount">
                        <div class="amount_box">
                            <a href="javascript:;" class="reduce reSty">-</a>
                            <input type="text" value="{{$v->num}}" class="sum">
                            <a href="javascript:;" class="plus">+</a>
                        </div>
                    </li>
                    <li class="list_sum">
                        <p class="sum_price">￥{{$v->price*$v->num}}</p>
                    </li>
                    <li class="list_op">
                        <p class="del"><a href="javascript:;" class="delBtn">移除商品</a></p>
                    </li>
                </ul>
        
                @endif
            @endforeach 
            </div> 

        </div>
      
        @else 
            <div class="bar-right">
                <div class="piece"><strong class="piece_num">您的购物车空空如也</strong></div>

                <div class="calBtn"><a href="#" >立即登录</a></div>
            </div>

        @endif
        

        <!--底部-->
        <div class="bar-wrapper">
            <div class="bar-right">
                <div class="piece">已选商品<strong class="piece_num">0</strong>件</div>
                <div class="totalMoney">共计: <strong class="total_text">0.00</strong></div>
                <div class="calBtn"><a href="javascript:;" class="jiesuan">结算</a></div>
            </div>
        </div>
    </div>
    </section>
    <section class="model_bg"></section>
    <section class="my_model">
        <p class="title">删除宝贝<span class="closeModel">X</span></p>
        <p>您确认要删除该宝贝吗？</p>
        <div class="opBtn"><a href="javascript:;" class="dialog-sure">确定</a><a href="javascript:;" class="dialog-close">关闭</a></div>
    </section>
	
	<script src="/home/js/jquery.min.js"></script>
    <script src="/home/js/carts.js"></script>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
        });
        $('.delBtn').click(function(){
            var rs = confirm('删除商品?');
            if(!rs) return;
            // 参数发送到控制器中ID
            // 获取参数
            var id = $(this).parents('ul').find('.mark').attr('suib');
            var rem = $(this);
            $.get('/home/cartdel',{id:id},function(data){
                   if(data == 1){
                    rem.parents('ul').remove();
                    // 刷新
                    rem.reload(true);
                }
            })
        })
         $('.jiesuan').click(function(){
         // var gid = $(this).parents('div').find('.mark').attr('gid');
         var gid = '';
         $('.order_content').find('.mark').each(function(index){
            if (index == 0) {
                gid += $(this).attr('gid');
            } else {
                gid += ','+$(this).attr('gid');
            }
         });
         // var gid = gid.split(',');
          //console.log(gid);
         //return false;
           $.get('/home/cartcreate',{gid:gid},function(data){ 
                   location.href='/home/cart/add';
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