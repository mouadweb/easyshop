@extends('admin.index')
@section('title',$title)
@section('content')
    <div class="mws-panel grid_8">
        <div class="mws-panel-header">
            <span><i class="icon-table"></i>品牌列表</span>
        </div>
        <div class="mws-panel-body no-padding">
            <table class="mws-datatable-fn mws-table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>标题</th>
                    <th>网址</th>
                    <th>网站LOGO</th>
                    <th>描述</th>
                    <th>类型</th>
                    <th>状态</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($res as $v)
                    <tr>
                        <td>{{$v['id']}}</td>
                        <td>{{$v['title']}}</td>
                        <td>{{$v['url']}}</td>
                        <td><img src="{{$v['logo']}}" alt="" width='80px' height="80px"></td>
                        <td>{{$v['desc']}}</td>
                        <td>{{$v['type']}}</td>

                        <td>
                            @if($v->status== 1)

                                显示
                            @else
                                隐藏

                            @endif
                        </td>
                        <td>
                            <span class="btn-group">
                                <a href="/admin/links/{{$v['id']}}/edit" class="btn btn-small"><i class="icon-pencil"></i></a>

                            <form action="/admin/links/{{$v->id}}" method='post' style='display:inline'>
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