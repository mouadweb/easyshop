@extends('admin.index')
@section('title',$title)
@section('content')
   <div class="mws-panel grid_8">
        <div class="mws-panel-header">
            <span><i class="icon-table"></i>分类</span>
        </div>
        <div class="mws-panel-body no-padding">
            <table class="mws-datatable-fn mws-table">
                <thead>
                <tr>
                    <th>id</th>
                    <th>分类名称</th>
                    <th>关键字</th>
                    <th>分类图标</th>
                    <th>描述</th>
                    
                    <th>状态</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($cate as $v)
                    <tr>
                        <td>{{$v['id']}}</td>
                        <td>{{$v['cate_name']}}</td>
                        <td>{{$v['keyword']}}</td>
                        <td><img src="{{$v['icon']}}" alt="" width='80px'></td>
                        <td>{{$v['descrirption']}}</td>
                        <td>@if($v->status== 1)

                                启用
                            @else
                                禁用

                            @endif</td>
                        <td>
                            <span class="btn-group">
                                <a href="/admin/cate/{{$v['id']}}/edit" class="btn btn-small"><i class="icon-pencil"></i></a>

                            <form action="/admin/cate/{{$v->id}}" method='post' style='display:inline'>
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