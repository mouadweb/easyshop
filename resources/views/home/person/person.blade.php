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
            <form action="/home/xiu" method="post" enctype="multipart/form-data" id='art_form'>
            <div class="baseopxg">
                <!--第一部分-->
                <div class="tirstbf">
                    <span>
                        <img src="{{$per->profile}}" id="imgs"/>
                        <a href="#" id="img">编辑头像</a>
                    </span>
                    <em>用户名：</em>
                    <input style="float:left; border:1px solid #bbb; box-shadow:none; height:28px; font-size:12px; text-indent:6px; margin-top:65px" type="text"  value="{{$per->username}}" name="username" required />
                </div>
                <!--第二部分-->
                 <div class="thetwobf">
                    <em>昵称：</em><input style="float:left; border:1px solid #bbb; box-shadow:none; height:28px; font-size:12px; text-indent:6px" type="text"  value="{{$per->nicheng}}" name="nicheng" required />
                </div>
                 <div class="thetwobf">
                    <em>真实姓名：</em><input style="float:left; border:1px solid #bbb; box-shadow:none; height:28px; font-size:12px; text-indent:6px" type="text"  value="{{$per->name}}" name="name" required />
                </div>
                <div class="thetwobf">
                    <em>性别：</em>
                    <input type="radio" name="sex" style=" float:left; display:block; width:13px; height:13px; margin-top:9px" value="0" @if($per->sex == 0) checked @endif><span>男</span>
                    <input type="radio" name="sex" style=" float:left; display:block; width:13px; height:13px; margin-top:9px" value="1" @if($per->sex == 1) checked @endif><span>女</span>
                    <input type="radio" name="sex" style=" float:left; display:block; width:13px; height:13px; margin-top:9px" value="2" @if($per->sex == 2) checked @endif><span>保密</span>
                </div>
                <div class="thetwobf">
                    <em>电话：</em><input style="float:left; border:1px solid #bbb; box-shadow:none; height:28px; font-size:12px; text-indent:6px" type="text"  value="{{$per->phone}}" disabled name="phone" required />
                </div>
                <div class="thetwobf">
                    <em>邮箱：</em><input style="float:left; border:1px solid #bbb; box-shadow:none; height:28px; font-size:12px; text-indent:6px; width:160px" type="text" value="{{$per->email}}" disabled name="email" required />
                </div>
                <div class="thetwobf">

                    <em>头像：</em><input style="float:left; border:1px solid #bbb; box-shadow:none; height:28px; font-size:12px; text-indent:6px; width:160px" type="file" value="{{$per->profile}}" name="profile" required id="file_upload"/>
                </div>
                    {{csrf_field()}}
                    {{method_field('PUT')}}
                <div class="thetwobf">
                    <input type="submit" value="保存" style=" display:block; padding-left:20px; padding-right:20px; line-height:40px;float:left; font-size:14px; color:blue; margin-left:213px">
                </div>
            </div>
            <!--修改基本信息结束-->
        </div>
    </form>


@endsection

@section('myjs')
<script type="text/javascript">
    $(function () {
        $("#file_upload").change(function () {

            var imgPath = $("#file_upload").val();

            if (imgPath == "") {
                alert("请选择上传图片！");
                return;
            }
            //判断上传文件的后缀名
            var strExtension = imgPath.substr(imgPath.lastIndexOf('.') + 1);
            if (strExtension != 'jpg' && strExtension != 'gif'
                && strExtension != 'png' && strExtension != 'bmp') {
                alert("请选择图片文件");
                return;
            }

            var formData = new FormData($('#art_form')[0]);

            $.ajax({
                type: "POST",
                url: "/home/upload",
                data: formData,
                contentType: false,
                processData: false,
                success: function(data) {
                    $('#imgs').attr('src',data);
                    // $('#art_thumb').val(data);

                    setTimeout(function(){
                    alert('头像修改成功');
                    },1000)

                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert("上传失败，请检查网络后重试");
                }
            });
        })
    })
</script>
@stop