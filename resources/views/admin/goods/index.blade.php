@extends('admin.index')
@section('title',$title)
@section('content')
    <div class="mws-panel grid_8">
        <div class="mws-panel-header">
            <span><i class="icon-table"></i>商品列表</span>
        </div>
        <div class="mws-panel-body no-padding">
            <table class="mws-datatable-fn mws-table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>商品名</th>
                    <th>价格</th>
                    <th>大小</th>
                    <th>单位</th>
                    <th>详情</th>
                    <th>原图</th>
                    <th>大图</th>
                    <th>状态</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($res as $v)
                    <tr>
                        <th class="">
                            {{$v->id}}
                        </th>
                        <th class="uname">
                            {{$v->gname}}
                        </th>
                        <th class=" ">
                            {{$v->price}}
                        </th>
                        <th class=" ">
                            {{$v->gweight}}
                        </th>
                        <th class=" ">
                            {{$v->dw}}
                        </th>

                        <th class=" ">
                            {!!$v->content!!}
                        </th>
                       
                        <th><img src="{{$v->gimg}}" alt=""></th>
                        <th><img src="{{$v->glarge}}" alt=""></th>
                        <th class=" ">
                            @if($v->status== 1)

                                上架
                            @else 
                                下架

                            @endif
                        </th>
                        <th class=" ">
                            <a href="/admin/goods/{{$v->id}}/edit" class='btn btn-info'>修改</a>

                            <form action="/admin/goods/{{$v->id}}" method='post' style='display:inline'>
                                {{csrf_field()}}

                                {{method_field("DELETE")}}
                                <button class='btn btn-danger' onclick="return confirm('你确定要删除吗？')">删除</button>

                            </form>
                        </th>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- Panels End -->
@endsection