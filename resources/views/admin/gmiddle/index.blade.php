@extends('admin.index')

@section('title',$title)

@section('content')

<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span><i class="icon-table"></i> 图片列表</span>
    </div>
    <div class="mws-panel-body no-padding">
        <form action="/admin/gmiddle" method="get">
            <table class="mws-datatable-fn mws-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>商品</th>
                        <th>商品图片</th>
                        <th>操作</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach ($photos as $k=>$v)
                    <tr>
                        <th>{{$v->id}}</th>
                        
                        @foreach ($goods as $kt=>$vt)
                            @if($vt->id == $v->gid)
                            <th>{{$vt->gname}}</th>
                            @endif
                        @endforeach
                        <th><img src="{{$v->middle}}" alt=""></th>
                        <th>
                            <span class="btn-group">
                                <a href="/admin/gmiddle/{{$v['id']}}/edit" class="btn btn-small"><i class="icon-pencil"></i></a>

                                {{csrf_field()}}
                            </span>
                        </th>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </form>
    </div>
</div>
@stop