@extends('admin.index')
@section('title',$title)
@section('content')
    <div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span>添加</span>
    </div>
    <div class="mws-panel-body no-padding">
        <form class="mws-form" action="/admin/cate" method="post" enctype="multipart/form-data">
            <div class="mws-form-inline">
            	 <div class="mws-form-row">
                    <label class="mws-form-label">父类名称</label>
                    <div class="mws-form-item">
                        <select class="small" title="" name="pid">
                            <option value="0">请选择</option>
                            @foreach($cate as $v)
                            <option value="{{$v->id}}">{{$v->cate_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">分类名称</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" title="" name="cate_name" >
                    </div>
                </div>
               	 <div class="mws-form-row">
                    <label class="mws-form-label">关键字</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" title="" name="keyword" >
                    </div>
                </div>
                 <div class="mws-form-row">
                    <label class="mws-form-label">描述</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" title="" name="description" >
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">状态</label>
                    <div class="mws-form-item">
                         <input type="radio" title="" checked="checked" name="status" value="1" id="on"><label for="on">启用 </label>
                         <input type="radio" title="" name="status" value="0" id="off"><label for="off">禁用</label>
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