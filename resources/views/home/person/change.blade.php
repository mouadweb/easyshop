@extends('layout.personal')

@section('title', $title)

@section('content')



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
            <form action="/home/xpass" method="post" enctype="multipart/form-data" id='art_form'>
                <div class="thetwobf">
                     @if(session('error'))
                   <span><em><font color="red">{{session('error')}}</em></span>
                    @endif
                </div>
                <!--第二部分-->
                 <div class="thetwobf">
                    <em>原密码：</em><input style="float:left; border:1px solid #bbb; box-shadow:none; height:28px; font-size:12px; text-indent:6px" type="password"  value="" name="password" required />
                </div>
                 <div class="thetwobf">
                    <em>修改密码：</em><input style="float:left; border:1px solid #bbb; box-shadow:none; height:28px; font-size:12px; text-indent:6px" type="password"  value="" name="xpass" required />
                </div>

                <div class="thetwobf">
                    <em>确认密码：</em><input style="float:left; border:1px solid #bbb; box-shadow:none; height:28px; font-size:12px; text-indent:6px" type="password"  value="" name="qpass" required />
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