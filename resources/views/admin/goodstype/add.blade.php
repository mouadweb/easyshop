@extends('admin.index')
@section('title',$title)
@section('content')
    <div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span>添加商品类型</span>
    </div>
    <div class="mws-panel-body no-padding">
         <form action="/admin/goodstype" method="post" class="mws-form" enctype='multipart/form-data'>
                <div class="mws-form-inline">
                    <div class="mws-form-row">
                        <label class="mws-form-label">类型名称</label>
                        <div class="mws-form-item">
                            <input type="text" class="small" name='type_name'>
                        </div>
                    </div>
                </div>
                <div class="mws-button-row">
                    {{csrf_field()}}

                    <input type="submit" class="btn btn-primary" value="添加">

                </div>
            </form>
    </div>
    </div>
@endsection