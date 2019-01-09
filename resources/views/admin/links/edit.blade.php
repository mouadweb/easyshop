@extends('admin.index')
@section('title',$title)
@section('content')
    <div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span>修改商品品牌</span>
    </div>
    <div class="mws-panel-body no-padding">
        <form class="mws-form" action="/admin/links/{{$res->id}}" method="post" enctype="multipart/form-data" id="mws">
            <div class="mws-form-inline">
                <div class="mws-form-row">
                    <label class="mws-form-label">标题</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" title="" name="title" value="{{$res['title']}}">
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">网址</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" title="" name="url" value="{{$res['url']}}">
                    </div>
                </div>
                <div class="mws-form-row">
                        <label class="mws-form-label">图标</label>
                        <div class="mws-form-item">
                            <img src="{{$res['logo']}}" id='imgs' alt="上传后显示图片" >
                            <div style="position: relative;" class="fileinput-holder">
                                <input type="hidden" name="id" value="{{$res->id}}">
                                <meta name="csrf-token" content="{{ csrf_token() }}">
                                <input id="file_upload" type="file" name='logo' style="position: absolute; top: 0px; right: 0px; margin: 0px; cursor: pointer; font-size: 999px; opacity: 0; z-index: 999;">
                            </div>
                        </div>
                </div>
                 <div class="mws-form-row" style="width: 490px;" >
                        <label class="mws-form-label">描述</label>
                        <div class="mws-form-item">
                            <textarea rows="3" cols="20" name="desc"  style="width: 410px;">{{$res['desc']}}</textarea>
                        </div>
                    </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">类型</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" title="" name="type" value="{{$res['type']}}">
                    </div>
                </div>
                <div class="mws-form-row">
                        <label class="mws-form-label">状态</label>
                        <div class="mws-form-item clearfix">
                            <ul class="mws-form-list inline">
                                <li><label><input type="radio" name='status' value="1" @if($res->status== 1) checked @endif>显示</label></li>
                                <li><label><input type="radio" name='status' value="2" @if($res->status== 2) checked @endif>隐藏</label></li>
                            </ul>
                        </div>
                    </div>
                </div>
            <div class="mws-button-row">
                {{csrf_field()}}
                {{method_field('PUT')}}
                <input type="submit" value="提交" class="btn btn-warning">
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
            var formData = new FormData($('#mws')[0]);
            // var id = $('#id').val();
            $.ajax({
                type: "POST",
                url: "/admin/uploadlinks",
                data: formData,
                contentType: false,
                processData: false,
                success: function(data) {
                    // console.log(data);
                    $('#imgs').attr('src',data);
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert("上传失败，请检查网络后重试");
                }
            });
        })
    })
</script>
@stop