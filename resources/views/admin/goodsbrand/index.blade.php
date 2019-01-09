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
                    <th>品牌名称</th>
                    <th>品牌URL</th>
                    <th>品牌LOGO</th>
                    <th>品牌描述</th>
                    <th>品牌排序</th>
                    <th>品牌状态</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($res as $v)
                    <tr>
                        <td>{{$v['id']}}</td>
                        <td>{{$v['brand_name']}}</td>
                        <td>{{$v['brand_url']}}</td>
                        <td><img src="{{$v['brand_logo']}}" alt="" width='80px' height="80px"></td>
                        <td>{{$v['brand_desc']}}</td>
                        <td>{{$v['sort']}}</td>
                        <td>
                            @if($v->status== 1)

                                显示
                            @else
                                隐藏

                            @endif</td>
                        <td>
                            <span class="btn-group">
                                <a href="/admin/goodsbrand/{{$v['id']}}/edit" class="btn btn-small"><i class="icon-pencil"></i></a>

                            <form action="/admin/goodsbrand/{{$v->id}}" method='post' style='display:inline'>
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