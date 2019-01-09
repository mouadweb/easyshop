@extends('admin.index')
@section('title',$title)
@section('content')
    <div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span>修改资料</span>
    </div>
    <div class="mws-panel-body no-padding">
@php

                    $res = DB::table('admin')->where('id',session('uid'))->first();

                @endphp

        <form id='art_form' class="mws-form" action="/admin/upload" method="post" enctype="multipart/form-data">



                <div class="mws-form-row" style="width: 490px;" >
                    <div class="mws-form-item">
                        <img src="{{$res->profile}}" alt="上传后显示图片" width="100" id="imgs">
                    </div>
                </div>
                <div class="mws-form-row" style="width: 490px;" >
                    <label class="mws-form-label">上传头像</label>
                    <div class="mws-form-item">
                        <input id="file_upload" type="file" class="small" title="" name="profile">
                    </div>
                </div>
            </div>
            <div class="mws-button-row">

            {{csrf_field()}}
                <input type="hidden" name="id" value="{{$res->id}}">

            </div>
        </form>
    </div>
    </div>

@endsection

@section('myJs')
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
                url: "/admin/upload",
                data: formData,
                contentType: false,
                processData: false,
                success: function(data) {
                    $('#imgs').attr('src',data);
                    // $('#art_thumb').val(data);

                    setTimeout(function(){
                    location.href = '/admin';
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