@extends('admin.index')
@section('title',$title)
@section('content')
    <div class="mws-panel grid_8">
        <div class="mws-panel-header">
            <span><i class="icon-table"></i>{{$title}}</span>
        </div>
        <div class="mws-panel-body no-padding">
            <table class="mws-datatable-fn mws-table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>轮播图名称</th>
                    <th>轮播图</th>
                    <th>链接地址</th>
                    <th>排序序号</th>
                    <th>标题</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($res as $v)
                    <tr>
                        <td>{{$v['id']}}</td>
                        <td>{{$v['ad_name']}}</td>
                        <td><img src="{{$v['src']}}" alt="" width='80px' height="80px"></td>
                        <td>{{$v['url']}}</td>
                        <td>{{$v['sort']}}</td>
                        <td>{{$v['title']}}</td>
                        <td>
                            <span class="btn-group">
                                <a href="/admin/ad/{{$v['id']}}/edit" class="btn btn-small"><i class="icon-pencil"></i></a>
                            <form action="/admin/ad/{{$v->id}}" method='post' style='display:inline'>
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
