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
        <form class="mws-form" action="/admin/notice/{{$res->id}}" method="post" enctype="multipart/form-data">
                  <div class="mws-form-row">
                        <label class="mws-form-label">顶级分类</label>
                        <div class="mws-form-item">
                            <select class="small" name='cate_id' disabled>

                                <option value='0'>请选择</option>
                                @foreach($rs as $vs)
                                <option value='{{$vs->id}}' @if($res->cate_id == $vs->id) selected @endif  >{{$vs->cate_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">标题</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" title="" name="title" value="{{$res->title}}">
                    </div>
                </div>
                 <div class="mws-form-row">
                    <label class="mws-form-label">文章内容</label>
                    <div class="mws-form-item">
                        <script id="editor" name='content' type="text/plain" style="width:760px;height:500px;">
                            {!!$res->content!!}
                        </script>
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">文章状态</label>
                    <div class="mws-form-item clearfix">
                            <ul class="mws-form-list inline">
                           <li><label><input type="radio" name='status' value="1" @if($res->status== 1) checked @endif>开启</label></li>
                                <li><label><input type="radio" name='status' value="0" @if($res->status== 0) checked @endif>关闭</label></li>
                        </ul>
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
</script>
@stop