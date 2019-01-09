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
                    <th>权限路径名</th>
                    <th>权限路径</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($res as $per)
                    <tr>
                        <td>{{$per['id']}}</td>
                        <td>{{$per['url_name']}}</td>
                        <td>{{$per['url']}}</td>
                        <td>
                            <span class="btn-group">
                                <a href="/admin/permission/{{$per['id']}}/edit" class="btn btn-small"><i class="icon-pencil"></i></a>

                            <form action="/admin/permission/{{$per->id}}" method='post' style='display:inline'>
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