@extends('layout.personal')

@section('title', $title)

@section('content')
<div class="dfdaspjtk">
                <span style=" display:block; float:left; font-size:14px; font-weight:bold; line-height:34px; padding-left:20px; padding-right:20px; color:#666">订单状态:<s style="color:#09f">订单已经提交，等待买家付款</s>如果您未对该笔订单进行支付操作，<s style="color:#09f">系统将于 2016-07-04 08:33:23</s> 自动关闭该订单</span>
            </div>
            <!--订单信息-->
            <div class="dfdaspjtk">
                <span style=" display:block; font-size:14px; font-weight:bold; line-height:34px; padding-left:20px; padding-right:20px; color:#666; border-bottom:1px dashed #cacace">订单信息</span>
                <!--一条开始-->
                @foreach($ding as $v)
                <div class="qieken">
                    <em>收货地址:</em>
                    <span>{{$v->rec}}</span>
                    <span>{{$v->tel}}</span>
                    <span>{{$v->addr}}</span>
                </div>
                <!--一条结束-->
                <!--一条开始-->
                <div class="qieken">
                    <em>订单数量:</em>
                    <span>{{$v->count}}</span>
                </div>
                <div class="qieken">
                    <em>订单总额:</em>
                    <span>{{$v->sum}}</span>
                </div>
                <div class="qieken">
                    <em>发票:</em>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <!--一条结束-->
                <!--一条开始-->
                <div class="qieken">
                    <em>买家留言:</em>
                    <span>{{$v->umsg}}</span>
                </div>
                <!--一条结束-->
                <!--一条开始-->
                <div class="qieken">
                    <em>订单编号:</em>
                    <span>8000000000009301</span>
                </div>
                <!--一条结束-->
                <!--一条开始-->

                <!--一条结束-->
                <!--一条开始-->
                <div class="qieken">
                    <em>下单时间:</em>
                    <span>{{date('Y-m-d H:i:s',$v->create_time)}}</span>
                </div>
                 <div class="qieken">
                    <em>状态:</em>
                    <span>@if($v->status == 1)
                        未发货

                    @else

                        已发货

                @endif</span>

                </div>
                <!--一条结束-->
                 <!--一条开始-->
                <div class="qieken">
                    <em>支付方式:</em>
                    <span>在线支付</span>
                </div>
                <!--一条结束-->
            </div>
    @endforeach
@endsection