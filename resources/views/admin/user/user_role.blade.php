
@extends('admin.index')
@section('title',$title)
@section('content')
    <div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span>添加角色</span>
    </div>
    <div class="mws-panel-body no-padding">
        <form class="mws-form" action="/admin/do_user_role?id={{$res['id']}}" method="post" enctype="multipart/form-data">
            <div class="mws-form-inline">
                <div class="mws-form-row">
                    <label class="mws-form-label">用户名</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" title="" name="username" value="{{$res->username}}">
                    </div>
                </div>

            </div>
             <div class="mws-form-row">
                        <label class="mws-form-label">角色名</label>
                        <div class="mws-form-item clearfix">
                            <ul class="mws-form-list inline">
                              @foreach($roles as $k=>$v)
                                    @if(in_array($v->id,$info))
                                    <li>
                                        <label><input type="checkbox" name='role_id[]' value='{{$v->id}}' checked> {{$v->role_name}}</label>
                                    </li>
                                    @else
                                     <li>
                                        <label><input type="checkbox" name='role_id[]' value='{{$v->id}}'> {{$v->role_name}}</label>
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