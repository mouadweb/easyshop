@extends('admin.index')
@section('title',$title)
@section('content')
    <div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span>添加商品属性</span>
    </div>
    <div class="mws-panel-body no-padding">
         <form action="/admin/goodsattr" method="post" class="mws-form" enctype='multipart/form-data'>
                <div class="mws-form-inline">
                    <div class="mws-form-row">


                        <label class="mws-form-label">商品类型</label>
                        <div class="mws-form-item">
                            <select class="small" name='type_id'>

                                <option value=''>--请选择--</option>
                                @foreach($rs as $v)
                                <option value='{{$v->id}}'>{{$v->type_name}}</option>
                                @endforeach

                            </select>
                        </div>

                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">属性名称</label>
                        <div class="mws-form-item">
                            <input type="text" class="small" title="" name="attr_name">
                        </div>
                     </div>
                      <div class="mws-form-row">
                        <label class="mws-form-label">属性值</label>
                        <div class="mws-form-item">
                            <input type="text" class="small" title="" name="attr_values" >
                        </div>
                     </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">属性类型</label>
                        <div class="mws-form-item clearfix">
                            <ul class="mws-form-list inline">
                                <li><label><input type="radio" name='attr_type' value="1" checked>单项</label></li>
                                <li><label><input type="radio" name='attr_type' value="2">唯一</label></li>
                            </ul>
                        </div>
                    </div>
                </div>
                 <div class="mws-button-row">
                {{csrf_field()}}
                <input type="submit" value="添加" class="btn btn-warning">
                </div>
            </form>
    </div>
    </div>
@endsection