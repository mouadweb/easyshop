@extends('layout.admin')

@section('title',$title)

<script type="text/javascript" charset="utf-8" src="/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/ueditor/ueditor.all.min.js"> </script>
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
<script type="text/javascript" charset="utf-8" src="/ueditor/lang/zh-cn/zh-cn.js"></script>

@section('content')
<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span>{{$title}}</span>
    </div>
    <div class="mws-panel-body no-padding">

        @if (count($errors) > 0)
        <div class="mws-form-message error">
            显示错误信息
            <ul>
                @foreach ($errors->all() as $error)
                <li style='font-size:14px'>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="/admin/goods/{{$res->id}}" method="post" class="mws-form" enctype='multipart/form-data'>
            <div class="mws-form-inline">

                <div class="mws-form-row">
                    <label class="mws-form-label">分类名</label>
                    <div class="mws-form-item">
                        <select class="small" name='gcate' disabled>
                            <option value='0'>请选择</option>
                            @foreach($rs as $v)

                             @if($res->gcate == $v->id)
                                <option value='{{$v->id}}'  selected  >{{$v->cate_name}}</option                                 @else
                                <option value='{{$v->id}}' >{{$v->cate_name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
    
                <div class="mws-form-row">
                    <label class="mws-form-label">类型名</label>
                    <div class="mws-form-item">
                        <select class="small" name='gtype' disabled>
                            <option value='0'>请选择</option>
                            @foreach($types as $vt)

                             @if($res->gtype == $vt->id)
                                <option value='{{$vt->id}}'  selected  >{{$vt->type_name}}</option>
                                @else
                                <option value='{{$vt->id}}' >{{$vt->type_name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label">品牌名</label>
                    <div class="mws-form-item">
                        <select class="small" name='gbrand' disabled>
                            <option value='0'>请选择</option>
                            @foreach($rs as $vb)

                             @if($res->gbrand == $vb->id)
                                <option value='{{$vb->id}}'  selected  >{{$vb->brand_name}}</option>
                                @else
                                <option value='{{$vb->id}}' >{{$vb->brand_name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label">商品名</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" name='gname' value='{{$res->gname}}'>
                    </div>
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label">价格</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" name='price' value='{{$res->price}}'>
                    </div>
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label">大小</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" name='gweight' value='{{$res->gweight}}'>
                    </div>
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label">单位</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" name='dw' value='{{$res->dw}}'>
                    </div>
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label">详情</label>
                    <div class="mws-form-item">
                        <script id="editor" name='content' type="text/plain" style="width:760px;height:500px;">{!!$res->content!!}</script>
                    </div>
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label">商品图片</label>
                    <div class="mws-form-item">
                        <div style="position: relative;" class="fileinput-holder">
                            <img src="{{$res->gimg}}" class='imgs' alt="" style='width:130px;height:80px'>
                            <input type="file" name='gimg'style="position: absolute; top: 0px; right: 0px; margin: 0px; cursor: pointer; font-size: 999px; opacity: 0; z-index: 999;">
                        </div>
                    </div>
                </div>
                    
                <div class="mws-form-row">
                    <label class="mws-form-label">商品大图</label>
                    <div class="mws-form-item">
                        <div style="position: relative;" class="fileinput-holder">
                            <img src="{{$res->glarge}}" class='imgs' alt="" style='width:130px;height:80px'>
                            <input type="file" name='glarge' style="position: absolute; top: 0px; right: 0px; margin: 0px; cursor: pointer; font-size: 999px; opacity: 0; z-index: 999;">
                        </div>
                    </div>
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label">商品小图</label>
                    <div class="mws-form-item">
                        <div style="position: relative;" class="fileinput-holder">
                            @foreach($photoer as $vs)
                            <img src="{{$vs->small}}" class='imgs' gid="{{$vs->id}}" alt="" style='width:130px;height:80px'>
                            @endforeach

                            <input type="file" name='small[]' multiple  style="position: absolute; top: 0px; right: 0px; margin: 0px; cursor: pointer; font-size: 999px; opacity: 0; z-index: 999;">
                        </div>
                    </div>
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label">商品中图</label>
                    <div class="mws-form-item">
                        <div style="position: relative;" class="fileinput-holder">
                            @foreach($gmiddle as $vm)
                            <img src="{{$vm->middle}}" class='imgs' gid="{{$vm->id}}" alt="" style='width:130px;height:80px'>
                            @endforeach

                            <input type="file" name='middle[]' multiple  style="position: absolute; top: 0px; right: 0px; margin: 0px; cursor: pointer; font-size: 999px; opacity: 0; z-index: 999;">
                        </div>
                    </div>
                </div>
                
                <div class="mws-form-row">
                    <label class="mws-form-label">状态</label>
                    <div class="mws-form-item clearfix">
                        <ul class="mws-form-list inline">
                            <li><label><input type="radio" name='status' value="1" @if($res->status== 1)checked @endif>上架</label></li>
                            <li><label><input type="radio" name='status' value="0" @if($res->status== 0)checked @endif>下架</label></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="mws-button-row">
                {{csrf_field()}}

                {{method_field('PUT')}}

                <input type="submit" class="btn btn-primary" value="修改">
                
            </div>
        </form>
    </div>      
</div>


@stop

@section('myJs')
<script>
     var ue = UE.getEditor('editor');

     //把图片进行删除
    $('.imgs').click(function(){

        var gid = $(this).attr('gid');

        var gs = $(this);

        $.get('/admin/goods/'+gid,{},function(data){

            if(data == 1){

                gs.remove();
            }
        })
     })

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
                url: "/admin/uploadphotos",
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