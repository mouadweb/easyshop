@extends('admin.index')
@section('title',$title)
@section('content')
    <div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span>{{$title}}</span>
    </div>
    <div class="mws-panel-body no-padding">
        <form class="mws-form" action="/admin/links" method="post" enctype="multipart/form-data">
            <div class="mws-form-inline">
                <div class="mws-form-row">
                    <label class="mws-form-label">标题</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" title="" name="title" >
                    </div>
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label">网址</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" title="" name="url">
                    </div>
                </div>
                  <div class="mws-form-row" style="width: 490px;" >
                    <label class="mws-form-label">网站LOGO</label>
                    <div class="mws-form-item">
                        <input type="file" class="small" title="" name="logo">
                    </div>
                </div>
                   <div class="mws-form-row" style="width: 490px;" >
                        <label class="mws-form-label">网站描述</label>
                        <div class="mws-form-item">
                            <textarea rows="3" cols="20" name="desc"  style="width: 410px;" placeholder="请输入网站描述"></textarea>
                        </div>
                    </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">类型</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" title="" name="type">
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">网站状态</label>
                    <div class="mws-form-item clearfix">
                            <ul class="mws-form-list inline">
                            <li><label><input type="radio" name='status' value="1" checked>显示</label></li>
                            <li><label><input type="radio" name='status' value="2">隐藏</label></li>
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
@endsection