@extends('admin.index')
@section('title',$title)
@section('content')
    <div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span>{{$title}}</span>
    </div>
    <div class="mws-panel-body no-padding">
        <form class="mws-form" action="/admin/xpass" method="post" enctype="multipart/form-data">
            <div class="mws-form-inline">
                <div class="mws-form-row">
                    <label class="mws-form-label">原密码</label>
                    <div class="mws-form-item">
                        <input type="password" class="small" title="" name="password" value="">
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">修改密码</label>
                    <div class="mws-form-item">
                        <input type="password" class="small" title="" name="xpass" value="">
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">确认密码</label>
                    <div class="mws-form-item">
                        <input type="password" class="small" title="" name="qpass" value="">
                    </div>
                </div>


            <div class="mws-button-row">
                {{csrf_field()}}

                <input type="hidden" name="id" value="">
                <input type="submit" value="提交" class="btn btn-warning">
            </div>
        </form>
    </div>
    </div>
@endsection