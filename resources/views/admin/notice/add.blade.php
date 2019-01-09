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
        <form class="mws-form" action="/admin/notice" method="post" enctype="multipart/form-data">
            <div class="mws-form-inline">
                    <div class="mws-form-row">
                        <label class="mws-form-label">顶级分类</label>
                        <div class="mws-form-item">
                            <select class="small" name='cate_id'>
                                <option value='0'>请选择</option>
                                @foreach($rs as $v)
                                <option value='{{$v->id}}'>{{$v->cate_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">标题</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" title="" name="title" >
                    </div>
                </div>
                 <div class="mws-form-row">
                    <label class="mws-form-label">文章内容</label>
                    <div class="mws-form-item">
                        <script id="editor" name='content' type="text/plain" style="width:760px;height:500px;"></script>
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">文章状态</label>
                    <div class="mws-form-item clearfix">
                            <ul class="mws-form-list inline">
                            <li><label><input type="radio" name='status' value="1" checked>显示</label></li>
                            <li><label><input type="radio" name='status' value="0">隐藏</label></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="mws-button-row">
                {{csrf_field()}}
                <input type="submit" value="添加" class="btn btn-warning">
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