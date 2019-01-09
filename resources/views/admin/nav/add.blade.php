@extends('admin.index')
@section('title',$title)
@section('content')
    <div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span>添加用户</span>
    </div>
    <div class="mws-panel-body no-padding">
         <form action="/admin/nav" method="post" class="mws-form" enctype='multipart/form-data'>
                <div class="mws-form-inline">
                    <div class="mws-form-row">
                        <label class="mws-form-label">导航名称</label>
                        <div class="mws-form-item">
                            <input type="text" class="small" name='name'>
                        </div>
                    </div>

                    <div class="mws-form-row">
                        <label class="mws-form-label">导航地址</label>
                        <div class="mws-form-item">
                            <input type="text" class="small" name='url'>
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">状态</label>
                        <div class="mws-form-item clearfix">
                            <ul class="mws-form-list inline">
                                <li><label><input type="radio" name='new_blank' value="1" checked>新标签</label></li>
                                <li><label><input type="radio" name='new_blank' value="2">原界面</label></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="mws-button-row">
                    {{csrf_field()}}

                    <input type="submit" class="btn btn-primary" value="添加">

                </div>
            </form>
    </div>
    </div>
@endsection