@extends('layout.personal')

@section('title', $title)

@section('content')
    <div class="zuirifip">
        @php

        $person = DB::table('user')->where('id',session('sid'))->first();

        @endphp
            <!--账户安全-->
            <div class="dfdaspjtk" style=" margin-top:0">
                <span style=" display:block; float:left; font-size:14px; font-weight:bold; line-height:34px; padding-left:20px; padding-right:20px; color:#666">账户安全</span>
            </div>
            <!--您当前的安全等级等-->
            <div class="younowaq">
                <span>尊敬的&nbsp;<em>{{$person->username}}</em>&nbsp;您当前的安全等级<s>低</s>建议您提升安全等级，以保障资金和账户的安全</span>
            </div>
            <div class="gzbangdingks">
            <!--一种绑定开始-->
                <div class="gzbdks">
                <!--左-->
                    <div class="gzbdks1">
                        <span>登录密码</span>
                        <p style="color:#3CC">已设置</p>
                    </div>
                <!--中-->
                    <div class="gzbdks2">
                        <p>安全性高的密码可以使账号更安全。建议您定期更换密码，且设置一个包含数字和字母，并长度超过6位以上的密码，为保证您的账户安全，只有在您绑定邮箱或手机后才可以修改密码。</p>
                    </div>
                <!--右-->
                    <div class="gzbdks3">
                        <a href="/home/change" style=" background:#f90">修改密码</a>
                    </div>
                </div>
            <!--一种绑定结束-->
            <!--一种绑定开始-->
                <div class="gzbdks">
                <!--左-->
                    <div class="gzbdks1">
                        <span>邮箱绑定</span>
                        <p style="color:#3CC">已绑定</p>
                    </div>
                <!--中-->
                    <div class="gzbdks2">
                        <p>进行邮箱验证后，可用于接收敏感操作的身份验证信息，以及订阅更优惠商品的促销邮件。</p>
                    </div>
                <!--右-->
                    <div class="gzbdks3">
                        <a href="#" style=" background:#09f">绑定邮箱</a>
                    </div>
                </div>
            <!--一种绑定结束-->
            <!--一种绑定开始-->
                <div class="gzbdks">
                <!--左-->
                    <div class="gzbdks1">
                        <span>手机绑定</span>
                        <p style="color:#3CC">已绑定</p>
                    </div>
                <!--中-->
                    <div class="gzbdks2">
                        <p>进行手机验证后，可用于接收敏感操作的身份验证信息，以及进行积分消费的验证确认，非常有助于保护您的账号和账户财产安全。</p>
                    </div>
                <!--右-->
                    <div class="gzbdks3">
                        <a href="/home/phone" style=" background:#09f">绑定手机</a>
                    </div>
                </div>
            <!--一种绑定结束-->
            <!--一种绑定开始-->
                <div class="gzbdks">
                <!--左-->
                    <div class="gzbdks1">
                        <span>支付密码</span>
                        <p style="color:#3CC">未设置</p>
                    </div>
                <!--中-->
                    <div class="gzbdks2">
                        <p>设置支付密码后，在使用账户中余额时，需输入支付密码。</p>
                    </div>
                <!--右-->
                    <div class="gzbdks3">
                        <a href="#" style="background:#09f">设置密码</a>
                    </div>
                </div>
            <!--一种绑定结束-->
            </div>
            <!--账户安全结束-->
        </div>

@endsection