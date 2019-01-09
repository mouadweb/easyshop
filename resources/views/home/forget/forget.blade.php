<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <title>找回密码</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
     <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="Keywords" content="网站关键词">
    <meta name="Description" content="网站介绍">
    <link rel="stylesheet" href="/login/css/base.css">
    <link rel="stylesheet" href="/login/css/iconfont.css">
    <link rel="stylesheet" href="/login/css/reg.css">
</head>
<body>
<div id="ajax-hook"></div>
<div class="wrap">
    <div class="wpn">
        <div class="form-data find_password">
            <h4>找回密码</h4>
            <p class="right_now">已有账号，<a href="/home/login">马上登录</a></p>
        <form action="/home/doforget" method="post" id="forms">
            <p class="p-input pos">
                <label for="pc_tel">手机号</label>
                <input type="text" id="pc_tel" name="phone">
                @if(session('error'))
                <span class="tel-warn pc_tel-err"><em>{{session('error')}}</em><i class="icon-warn"></i></span>
                @endif
            </p>
            <p class="p-input pos">
                <label for="veri-code">输入验证码</label>
                <input type="number" id="veri-code" name="code">
                <a href="javascript:;" class="send" id="but">发送验证码</a>
                <span class="time hide"><em>120</em>s</span>
                <span class="tel-warn error" id="error"><em></em></span>
            </p>
                {{csrf_field()}}
            <button class="lang-btn next">下一步</button>
            <p class="right">Powered by © 2018</p>
        </form>
        </div>
    </div>
</div>
<script src="/login/js/jquery.js"></script>
<script src="/login/js/agree.js"></script>

<script>
 $.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
     }
     });
 $.ajaxSetup({async:false});
 //var PH = true;
    var CV = false;
    $('#but').click(function(){


            //获取手机号
            var phone = $('input[name=phone]').val().trim();

            //发送ajax
            $.post('/home/checkphone',{number:phone},function(data){

                console.log(data);
            })

        })

        $('input[name=code]').blur(function(){
            ///获取验证码
            var cd = $(this).val().trim();

            //console.log(cd);

            if(cd == ''){
                    $('#error').text('验证码不能为空');
                    CV = false;
                    return;
            }

            //var cs = $(this);
            //发送ajax
            $.get('/home/checkcode',{codes:cd},function(data){



                if(data == '0'){

                    $('#error').text('验证码不正确');

                    CV = false;
                } else {

                     $('#error').text('验证码正确');

                    CV = true;
                }
            })

        })
        $('#forms').submit(function(){

            $('input[name=code]').trigger('blur');
            $('input[name=phone]').trigger('blur');


            if(CV){

                return true;
            }
            //var flag = 1   var flag = 0
            return false;
        })

</script>

</body>
</html>
