@extends('layout.personal')

@section('title', $title)

@section('content')


<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="zuirifip">
            <!--基本信息-->
            <div class="basedexinxi">
                <a href="#">基本信息</a>
            </div>
            <!--基本信息结束-->
        @php

            $per = DB::table('user')->where('id',session('sid'))->first();

         @endphp
            <!--修改基本信息开始-->
            <form action="/home/dophone" method="post" enctype="multipart/form-data" id='art_form'>
                <div class="thetwobf">

                </div>
                <!--第二部分-->
                 <div class="thetwobf">
                    <em>手机号：</em><input style="float:left; border:1px solid #bbb; box-shadow:none; height:28px; font-size:12px; text-indent:6px" type="text"  value="" name="phone" required />
                </div>
                 <div class="thetwobf">
                    <em>验证码：</em><input style="float:left; border:1px solid #bbb; box-shadow:none; height:28px; font-size:12px; text-indent:6px" type="text"  value="" name="code" required />
                    <button style="float:left; border:1px solid #bbb; box-shadow:none; height:28px; font-size:12px; text-indent:6px" id="but">获取验证码</button>
                </div>



                    {{csrf_field()}}

                <div class="thetwobf">
                    <input type="submit" value="保存" style=" display:block; padding-left:20px; padding-right:20px; line-height:40px;float:left; font-size:14px; color:blue; margin-left:213px">
                </div>
            </div>
            <!--修改基本信息结束-->
        </div>
    </form>


@endsection

@section('myjs')

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
@endsection
