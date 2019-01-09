@extends('admin.index')
@section('title',$title)
@section('content')
    <div class="mws-panel grid_8">
        <div class="mws-panel-header">
            <span><i class="icon-table"></i>用户表</span>
        </div>
        <div class="mws-panel-body no-padding">
            <table class="mws-datatable-fn mws-table">
                <thead>
                <tr>
                    <th>id</th>
                    <th>用户名</th>
                    <th>手机</th>
                    <th>邮箱</th>
                    <th>头像</th>
                    <th>添加角色</th>
                    <th>状态</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($res as $user)
                    <tr>
                        <td>{{$user['id']}}</td>
                        <td>{{$user['username']}}</td>
                        <td>{{$user['phone']}}</td>
                        <td>{{$user['email']}}</td>
                        <td><img src="{{$user['profile']}}" alt="" width='80px'></td>
                        <td width="80"><span>
                                <a href="/admin/user_role?id={{$user['id']}}" class="btn btn-small"><i class="icol-add"></i></a></span></td>
                        <td>@if($user->status== 1)

                                启用
                            @else
                                禁用

                            @endif
                        </td>
                        <td>

                            <span class="btn-group">
                                <a href="/admin/user/{{$user['id']}}/edit" class="btn btn-small"><i class="icon-pencil"></i></a>

                            <form action="/admin/user/{{$user->id}}" method='post' style='display:inline'>
                                {{csrf_field()}}

                                {{method_field("DELETE")}}
                                <button class='btn btn-small'><i class="icon-trash"></i></button>

                            </form>


                            </span>
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- Panels End -->
@endsection