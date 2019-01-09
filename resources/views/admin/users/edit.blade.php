@extends('admin.index')
@section('title',$title)
@section('content')
    <div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span>修改用户资料</span>
    </div>
    <div class="mws-panel-body no-padding">
        <form class="mws-form" action="/admin/users/{{$res->id}}" method="post" enctype="multipart/form-data">
            <div class="mws-form-inline">
                <div class="mws-form-row">
                    <label class="mws-form-label">用户姓名</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" title="" name="username" value="{{$res->username}}">
                    </div>
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label">邮箱</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" title="" name="email" value="{{$res->email}}">
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">手机号</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" title="" name="phone" value="{{$res->phone}}">
                    </div>
                </div>
               <div class="mws-form-row">
                        <label class="mws-form-label">性别</label>
                        <div class="mws-form-item clearfix">
                            <ul class="mws-form-list inline">
                                <li><label><input type="radio" name='sex' value="1"  @if($res->sex== 1) checked @endif>男</label></li>
                                <li><label><input type="radio" name='sex' value="0" @if($res->sex== 0) checked @endif>女</label></li>
                                <li><label><input type="radio" name='sex' value="2" @if($res->sex== 2) checked @endif>保密</label></li>
                            </ul>
                        </div>
                    </div>
                    <div class="mws-form-row">
                    <label class="mws-form-label">积分</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" title="" name="points" value="{{$res->points}}">
                    </div>
                </div>
                <!-- <div class="mws-form-row">
                    <label class="mws-form-label">注册时间</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" title="" name="create_time">
                    </div>
                </div> -->

                <div class="mws-form-row" style="width: 490px;" >
                    <label class="mws-form-label">上传头像</label>
                    <div class="mws-form-item">
                        <input type="file" class="small" title="" name="{{$res->profile}}">
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

