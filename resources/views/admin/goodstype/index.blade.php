@extends('admin.index')
@section('title',$title)
@section('content')
    <div class="mws-panel grid_8">
        <div class="mws-panel-header">
            <span><i class="icon-table"></i>导航表</span>
        </div>
        <div class="mws-panel-body no-padding">
            <table class="mws-datatable-fn mws-table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>类型名</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
               @foreach($res as $k => $v)
                    <tr>
                        <td>{{$v->id}}</td>
                        <td>{{$v->type_name}}</td>
                        <td>
                            <span class="btn-group">
                                <a href="/admin/goodstype/{{$v->id}}/edit" class="btn btn-small"><i class="icon-pencil"></i></a>
                                <form action="/admin/goodstype/{{$v->id}}" method='post' style='display:inline'>
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