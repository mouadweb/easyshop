@extends('admin.index')
@section('title',$title)
@section('content')
    <div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span>修改商品图片</span>
    </div>
    <div class="mws-panel-body no-padding">
        <form class="mws-form" action="/admin/gmiddle/{{$res->id}}" method="post" enctype="multipart/form-data" id="mws">
            <div class="mws-form-inline">
                <div class="mws-form-row">
                    <label class="mws-form-label">商品</label>
                    <div class="mws-form-item">
                        <select class="small" name='gid' disabled>
                            <option value='0'>请选择</option>
                            @foreach($goods as $v)

                             @if($res->gid == $v->id)
                                <option value='{{$v->id}}'  selected>{{$v->gname}}</option>
                                @else
                                <option value='{{$v->id}}' >{{$v->gname}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                {{--<div class="mws-form-row" style="width: 490px;" >
                    <label class="mws-form-label">商品图片</label>
                    <div class="mws-form-item">
                       <img src="{{$res->gimg}}" alt="" width='80px' height="80px">
                        <input type="file" class="small" title="" name="gimg[]" value="">
                    </div>
                </div>--}}

                 <div class="mws-form-row">
                        <label class="mws-form-label">商品图片</label>
                        <div class="mws-form-item">
                            <img src="{{$res->middle}}" id='imgs' alt="上传后显示图片" >
                            <div style="position: relative;" class="fileinput-holder">
                                <input type="hidden" name="id" value="{{$res->id}}">
                                <meta name="csrf-token" content="{{ csrf_token() }}">
                                <input id="file_upload" type="file" name='middle' style="position: absolute; top: 0px; right: 0px; margin: 0px; cursor: pointer; font-size: 999px; opacity: 0; z-index: 999;">
                        </div>
                    </div>
                </div>

            </div>     
            <div class="mws-button-row">
                {{csrf_field()}}
                {{method_field('PUT')}}
                <input type="submit" value="修改" class="btn btn-warning">
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

            $.ajax({
                type: "POST",
                url: "/admin/uploadgmiddle",
                data: formData,
                contentType: false,
                processData: false,
                success: function(data) {
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