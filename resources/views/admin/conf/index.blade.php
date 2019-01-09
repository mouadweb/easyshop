@extends('admin.index')
@section('title',$title)
@section('content')
    <div class="mws-panel grid_8">
        <div class="mws-panel-header">
            <span><i class="icon-table"></i>网站配置列表</span>
        </div>
        <div class="mws-panel-body no-padding">
            <table class="mws-datatable-fn mws-table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>标题</th>
                    <th>关键字</th>
                    <th>网站描述</th>
                    <th>网站版权</th>
                    <th>网站开关</th>
                    <th>网站LOGO</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($res as $v)
                    <tr>
                        <td>{{$v['id']}}</td>
                        <td>{{$v['title']}}</td>
                        <td>{{$v['keyword']}}</td>
                        <td>{{$v['desc']}}</td>
                        <td>{{$v['copyright']}}</td>
                        <td>
                            @if($v->status== 1)
                                打开
                            @else
                                关闭
                            @endif
                        </td>
                        <td><img src="{{$v['logo']}}" alt="" width='80px' height="80px"></td>
                        <td>
                            <span class="btn-group">
                                <a href="/admin/conf/{{$v['id']}}/edit" class="btn btn-small"><i class="icon-pencil"></i></a>
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