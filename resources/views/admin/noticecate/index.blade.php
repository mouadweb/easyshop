@extends('admin.index')
@section('title',$title)
@section('content')
    <div class="mws-panel grid_8">
        <div class="mws-panel-header">
            <span><i class="icon-table"></i>帮助栏目表</span>
        </div>
        <div class="mws-panel-body no-padding">
            <table class="mws-datatable-fn mws-table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>分类名</th>
                    <th>PID</th>
                    <th>路径</th>
                    <th>状态</th>
                    <th>添加时间</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($res as $k => $v)
                    <tr>
                        <td>{{$v->id}}</td>
                        <td>{{$v->cate_name}}</td>
                        <td>{{$v->cid}}</td>
                        <td>{{$v->path}}</td>
                        <td>
                            @if($v->status== 1)

                                启用
                            @else
                                禁用

                            @endif
                        </td>
                        <td>
                            <?php
                                $time = $v->create_time;
                                echo date("Y-m-d H:m",$time);
                            ?>
                        </td>
                        <td>
                            <span class="btn-group">
                                <a href="/admin/noticecate/{{$v->id}}/edit" class="btn btn-small"><i class="icon-pencil"></i></a>

                                <form action="/admin/noticecate/{{$v->id}}" method='post' style='display:inline'>
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