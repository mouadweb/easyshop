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
                    <th>性别</th>
                    <th>积分</th>
                    <th>注册时间</th>
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

                        <td>@if($user->sex== 1)

                                男
                            @elseif($user->sex == 0)
                                女
                            @else

                                保密
                            @endif
                        </td>
                        <td>{{$user['points']}}</td>
                        <td>
                        <?php
                                $time = $user->create_time;
                                echo date("Y-m-d H:m",$time);
                            ?>
                            </td>
                        <td>

                            <span class="btn-group">
                                <a href="/admin/users/{{$user['id']}}/edit" class="btn btn-small"><i class="icon-pencil"></i></a>

                            <form action="/admin/users/{{$user->id}}" method='post' style='display:inline'>
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
