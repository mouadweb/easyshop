@extends('admin.index')
@section('title',$title)
@section('content')
    <div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span>修改资料</span>
    </div>
    <div class="mws-panel-body no-padding">
       <form action="/admin/nav/{{$res->id}}" method="post" class="mws-form" enctype='multipart/form-data'>
                <div class="mws-form-inline">
                    <div class="mws-form-row">
                        <label class="mws-form-label">导航名</label>
                        <div class="mws-form-item">
                            <input type="text" class="small" name='name' value='{{$res->name}}'>
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">地址</label>
                        <div class="mws-form-item">
                            <input type="text" class="small" name='url' value="{{$res->url}}">
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">状态</label>
                        <div class="mws-form-item clearfix">
                            <ul class="mws-form-list inline">
                                <li><label><input type="radio" name='new_blank' value="1" @if($res->new_blank== 1) checked @endif>新标签</label></li>
                                <li><label><input type="radio" name='new_blank' value="2" @if($res->new_blank== 2) checked @endif>原界面</label></li>
                            </ul>
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