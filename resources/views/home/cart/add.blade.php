@extends('layout.home')
<link rel="stylesheet" type="text/css" href="/home/css/shangpingoumai.css">
<meta name="_token" content="{{ csrf_token() }}" />
@section('content')
</div>
<script src="/home/js/jquery-1.8.3.min.js"></script>
<script src="/home/js/city.js/cityJson.js"></script>
<script src="/home/js/city.js/citySet.js"></script>
<script src="/home/js/city.js/Popt.js"></script>
<!--全部开始-->
{{--<form action="/home/pay/index" method="post" name="form1" id="form1">--}}
  {{--{{csrf_field()}}--}}
<div class="tianxiehedui">
	<!--标题-->
    <div class="rzhdndgw">温馨提示：请认真核对您的购物信息</div>
    <!--收货人信息-->
    <div class="shouhurxl clastyo">
        <div class="shouhurxl1">
            <em>收货人信息</em>
            <a href="#" class="chgeb">修改</a>
        </div>
        <div class="shouhurxl2">
            <span>{{ $addresses[0]['contact_name'] }}</span>
            <span>{{ $addresses[0]['hcity'] }}	{{ $addresses[0]['hproper'] }}	{{ $addresses[0]['harea'] }}{{ $addresses[0]['address'] }}</span>
            <span><em>电话：</em><em>{{ $addresses[0]['contact_phone'] }}</em></span>
        </div>
    </div>
    <!--点击修改会出现这个选择框-->
    <div class="changepc">
        <!--以前的旧地址-->
        @foreach($addresses as $address)
        <div class="tongyongdizhi">
            <input type="radio" name="adressa" style=" float:left; display:block; width:13px; height:13px; margin-top:9px">
            <span>{{ $address->contact_name }}</span>
            <span>{{ $address->hcity }}	{{ $address->hproper }}	{{ $address->harea }}{{ $address->address }}</span>
            <span><em>电话：</em><em>{{ $address->contact_phone }}</em></span>
            <a href="{{ route('user_addresses.destroy', $address->id) }}" onclick="sendStatus(this);return false;">删除</a>
        </div>
        @endforeach
        <!--添加新地址-->
        <div class="dandudizhi">
            <input type="radio" name="adressa" class="adressa" style=" float:left; display:block; width:13px; height:13px; margin-top:9px">
            <span>使用新地址</span>
        </div>
        <!--添加新地址-->
        <form action="{{ route('user_addresses.store') }}" method="post" name="form1" id="form1">
            {{csrf_field()}}
        <div class="opcaty1">
            <div class="opcaty2">
                <em>收货人姓名：</em>
                <input name="contact_name" style="float:left; border:1px solid #bbb; box-shadow:none; height:28px; font-size:12px; text-indent:6px" type="text" class="shuru"/>

            </div>
            <div class="opcaty2">
                <em>所在的地区：</em>
                <input type="text" id="city" value="点击选择地区" style=" height:28px; font-size:12px; border:1px solid #bbb; float:left">
                <script type="text/javascript">
                    $("#city").click(function (e) {
                        SelCity(this,e);
                    });
                </script>
            </div>
            <div class="opcaty2">
                <em>详细的地址：</em>
                <input name="address" style="float:left; border:1px solid #bbb; box-shadow:none; height:28px; font-size:12px; text-indent:6px; width:488px" type="text" class="shuru" placeholder="请填写真实地址，不需要重复填写所在地区" required />

            </div>
            <div class="opcaty2">
                <em>联系的电话：</em>
                <input name="contact_phone" style="float:left; border:1px solid #bbb; box-shadow:none; height:28px; font-size:12px; text-indent:6px" type="text" class="shuru"/>

            </div>
            <button type="submit" class="bcshrxopl">保存收货人信息</button>
        </div>
        </form>
        <!--新地址结束-->
        <!--添加新地址结束-->
    </div>

    <script>
        function sendStatus(node) {
            var url = node.href;
            $.ajax({
                url:url,
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                },
                success:function (res) {
                    location.reload()
                }
            })
        }
        $(function(){
            $(".chgeb").click(function(){
                $(".changepc").css({display:"block"});
                $(".clastyo").css({display:"none"})
            })
            $(".bcshrxopl").click(function(){
                $(".changepc").css({display:"none"});
                $(".clastyo").css({display:"block"});
                $(".opcaty1").css({display:"none"})
            })
            $(".adressa").click(function(){
                $(".opcaty1").css({display:"block"})
            })
        })
    </script>

    <!--这个选择框结束-->
    <!--收货人信息结束-->
    <!--支付方式-->
    <div class="shouhurxl">
    	<h3>支付方式</h3>
        <div class="zhifufangsj1">
        	<span>在线支付</span>
        </div>
    </div>
    <!--支付方式结束-->
    <!--发票信息-->

    <!--修改发票信息-->
    <!--发票信息结束-->
    <!--商品清单-->
    <div class="shouhurxl">
    	<!--一条商品信息开始-->
          @foreach($goods as $v)
        
    	<div class="xxpop1" style="background:rgba(255,153,0,0.1); padding-bottom:6px">
        	
            <div class="xxpop2" style=" width:630px">
            					<span>商品</span>
                                <a href="#"><p style=" line-height:20px"><img src="{{ $v->middle }}"/>&nbsp;{{$v->gname}}</p></a>
            </div>
            <div class="xxpop2">
            					<span>单价(元)</span>
                                <p>{{$v->price}}</p>
            </div>
            <div class="xxpop2">
            					<span>数量</span>
                                <p>{{ $v->num }}</p>
            </div>
            <div class="xxpop2">
            					<span>小计(元)</span>
                                <p>{{ ($v->num) * ($v->price) }}</p>
            </div>
        </div>

        @endforeach
        <!--买家留言-->
        <div class="maijiayouhuayue">
        	<em style=" width:90px; text-align:right">买家留言：</em>
            <textarea  class="usmg" name="umsg" style=" line-height:20px; font-size:14px; color:#111; border:1px solid #bbb; width:1000px; box-shadow:none" placeholder="选填：对本次交易的说明（建议填写已经和商家达成一致的说明）"></textarea>
        </div>
        <!--商品合计-->
      <div class="shouhurxlm">
        	<ul>
            	<li>
                	<em><s>10</s>元</em>
                  <em>运费：</em>
              </li>
                <li>
                <em><s name="sum">{{ $total }}</s>元</em>
                  <em>本店合计：</em>
              </li>
            </ul>
            <!--订单总金额-->
        <div class="ddzjes">
            	<em>订单总金额：</em>
                <em name="sum" style=" padding-left:0"><s>{{ $total + 10 }}</s>元</em>
            </div>
            <!--使用预存款-->

            <!--请输入支付密码-->
            <div class="zgykskbj">
            	<em>支付密码：</em>
                <input style="float:left; border:1px solid #bbb; box-shadow:none; height:28px; font-size:12px; text-indent:6px; margin-top:10px" type="text" class="shuru"/>
                <a href="#">使用</a>
            </div>
            <script>
				$(function(){
					$(".dianyidian").click(function(){
						$(".zgykskbj").slideToggle()
						})
					})
            </script>
            <!--支付密码结束-->
      </div>
        <!--一条商品信息结束-->
    </div>
    <!--商品清单结束-->
    <button class="tijiaodingdang56" onclick="sendBtn(this);return false;">提交订单</button>
</div>
{{--</form>--}}
@stop
@section('myJs')
<!-- 全局 -->
<script src="/homes/bootstrap/js/bootstrap.min.js"></script>
<script src="/home/js/jquery-1.8.3.min.js"></script>
<script src="/home/js/public.js"></script>
<!-- 下拉商品分类 -->
<!-- 下拉商品分类 -->
<script>
    function sendBtn(node) {
        var url = "{{ route('order.store') }}";
        var sum = {{ $total + 10 }};
        var count = {{ $count }};
        var umsg = $('.usmg').val();

        $.ajax({
            url:url,
            type: 'POST',
            data:{sum:sum,count:count,umsg:umsg},
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            success:function (res) {
                location.href = '/home/pay/index'
            }
        })
    }
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
                     
           
            
                
                    
            
                
        
            
        

