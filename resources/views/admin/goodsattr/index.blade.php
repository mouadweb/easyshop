@extends('admin.index')
@section('title',$title)
@section('content')
    <div class="mws-panel grid_8">
        <div class="mws-panel-header">
            <span><i class="icon-table"></i>商品属性表</span>
        </div>
        <div class="mws-panel-body no-padding">
            <table class="mws-datatable-fn mws-table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>属性名</th>
                    <th>属性类型</th>
                    <th>属性值</th>
                    <th>商品类别类型</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($res as $k => $v)

                    <tr>
                        <td>{{$v->id}}</td>
                        <td>{{$v->attr_name}}</td>
                        <td>
                            @if($v->attr_type== 1)

                                单项
                            @else
                                唯一

                            @endif
                        </td>
                        <td>
                            {{$v->attr_values}}
                        </td>
                        <td>
                            @foreach($rs as $kk => $vv)
                                @if( $v->type_id==$vv->id)
                                    {{$vv->type_name}}
                                @endif
                            @endforeach
                        </td>
                        <td>
                            <span class="btn-group">
                                <a href="/admin/goodsattr/{{$v->id}}/edit" class="btn btn-small"><i class="icon-pencil"></i></a>

                                <form action="/admin/goodsattr/{{$v->id}}" method='post' style='display:inline'>
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