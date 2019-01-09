@extends('admin.index')
@section('title',$title)
@section('content')
    <div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span>修改商品类型</span>
    </div>
    <div class="mws-panel-body no-padding">
       <form action="/admin/goodstype/{{$res->id}}" method="post" class="mws-form" enctype='multipart/form-data'>
                <div class="mws-form-inline">
                    <div class="mws-form-row">
                        <label class="mws-form-label">商品类型名</label>
                        <div class="mws-form-item">
                            <input type="text" class="small" name='type_name' value='{{$res->type_name}}'>
                        </div>
                    </div>
                </div>
                <div class="mws-button-row">
                    {{csrf_field()}}
                    {{method_field('PUT')}}
                <input type="submit" value="修改" class="btn btn-warning">
                </div>
            </form>
    </div>
    </div>
@endsection