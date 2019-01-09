@extends('admin.index')
@section('title',$title)
@section('content')
    <div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span>添加权限</span>
    </div>
    <div class="mws-panel-body no-padding">
        <form class="mws-form" action="/admin/do_role_per?id={{$res->id}}" method="post" enctype="multipart/form-data">
            <div class="mws-form-inline">
                <div class="mws-form-row">
                    <label class="mws-form-label">角色名</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" title="" name="role_name" value="{{$res->role_name}}">
                    </div>
                </div>

            </div>
             <div class="mws-form-row">
                        <label class="mws-form-label">权限路径</label>
                        <div class="mws-form-item clearfix">
                            <ul class="mws-form-list inline">
                              @foreach($per as $k=>$v)
                                    @if(in_array($v->id,$info))
                                    <li>
                                        <label><input type="checkbox" name='per_id[]' value='{{$v->id}}' checked> {{$v->url_name}}</label>
                                    </li>
                                    @else
                                     <li>
                                        <label><input type="checkbox" name='per_id[]' value='{{$v->id}}'> {{$v->url_name}}</label>
                                    </li>
                                    @endif
                                @endforeach

                            </ul>
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