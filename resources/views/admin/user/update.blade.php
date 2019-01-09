@extends('admin.index')
@section('title',$title)
@section('content')
    <div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span>修改资料</span>
    </div>
    <div class="mws-panel-body no-padding">
        <form class="mws-form" action="/admin/user/{{$res->id}}" method="post" enctype="multipart/form-data">
            <div class="mws-form-inline">
                <div class="mws-form-row">
                    <label class="mws-form-label">用户姓名</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" title="" name="username" value="{{$res['username']}}">
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">email</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" title="" name="email" value="{{$res['email']}}">
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">phone</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" title="" name="phone" value="{{$res['phone']}}">
                    </div>
                </div>
                <div class="mws-form-row">
                        <label class="mws-form-label">状态</label>
                        <div class="mws-form-item clearfix">
                            <ul class="mws-form-list inline">
                                <li><label><input type="radio" name='status' value="1" @if($res->status== 1) checked @endif>开启</label></li>
                                <li><label><input type="radio" name='status' value="0" @if($res->status== 0) checked @endif>禁用</label></li>
                            </ul>
                        </div>
                    </div>
                <div class="mws-form-row" style="width: 490px;" >
                    <div class="mws-form-item">
                        <img src="{{$res['profile']}}" alt="" width="100">
                    </div>
                </div>
                <div class="mws-form-row" style="width: 490px;" >
                    <label class="mws-form-label">上传头像</label>
                    <div class="mws-form-item">
                        <input type="file" class="small" title="" name="profile">
                    </div>
                </div>
            </div>
            <div class="mws-button-row">
                {{csrf_field()}}
                {{method_field('PUT')}}
                <input type="hidden" name="id" value="{{$res['id']}}">
                <input type="submit" value="提交" class="btn btn-warning">
            </div>
        </form>
    </div>
    </div>
@endsection

