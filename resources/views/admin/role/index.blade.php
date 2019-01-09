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
                    <th>添加权限</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($res as $role)
                    <tr>
                        <td>{{$role['id']}}</td>
                        <td>{{$role['role_name']}}</td>
                        <td>
                            <span class="btn-group">


                                <a href="/admin/role_per?id={{$role->id}}" class="btn btn-small"><i class="icol-add"></i></a>
                            </span>
                            </td>

                        <td>
                            <span class="btn-group">


                                <a href="/admin/role/{{$role['id']}}/edit" class="btn btn-small"><i class="icon-pencil"></i></a>

                             <form action="/admin/role/{{$role->id}}" method='post' style='display:inline'>
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