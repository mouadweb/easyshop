@extends('admin.index')
@section('title',$title)
@section('content')
    <div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span>添加角色</span>
    </div>
    <div class="mws-panel-body no-padding">
        <form class="mws-form" action="/admin/permission/{{$res->id}}" method="post" enctype="multipart/form-data">
            <div class="mws-form-inline">
                <div class="mws-form-row">
                    <label class="mws-form-label">权限路径名</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" title="" name="url_name" value="{{$res->url_name}}">
                    </div>
                </div>
                    <div class="mws-form-row">
                    <label class="mws-form-label">权限路径</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" title="" name="url" value="{{$res->url}}">
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