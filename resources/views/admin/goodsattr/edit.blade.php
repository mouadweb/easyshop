@extends('admin.index')
@section('title',$title)
@section('content')
    <div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span>修改资料</span>
    </div>
    <div class="mws-panel-body no-padding">
        <form action="/admin/goodsattr/{{$res->id}}" method="post" class="mws-form" >
                <div class="mws-form-inline">
                    <div class="mws-form-row">
                        <label class="mws-form-label">商品类型</label>
                        <div class="mws-form-item">
                            <select class="small" name='type_id'>
                                @foreach($rs as $v)
                                    @if($res->type_id == $v->id)
                                    <option value='{{$v->id}}'  selected  >{{$v->type_name}}</option>
                                    @else
                                    <option value='{{$v->id}}' >{{$v->type_name}}</option>
                                    @endif
                                @endforeach

                            </select>
                        </div>

                    </div>
                     <div class="mws-form-row">
                        <label class="mws-form-label">属性名称</label>
                        <div class="mws-form-item">
                            <input type="text" class="small" title="" name="attr_name" value="{{$res->attr_name}}">
                        </div>
                     </div>
                      <div class="mws-form-row">
                        <label class="mws-form-label">属性值</label>
                        <div class="mws-form-item">
                            <input type="text" class="small" title="" name="attr_values" value="{{$res->attr_values}}">
                        </div>
                     </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">属性类型</label>
                        <div class="mws-form-item clearfix">
                            <ul class="mws-form-list inline">
                                <li><label><input type="radio" name='attr_type' value="1" @if($res->attr_type== 1) checked @endif>单项</label></li>
                                <li><label><input type="radio" name='attr_type' value="2" @if($res->attr_type== 2) checked @endif>唯一</label></li>
                            </ul>
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