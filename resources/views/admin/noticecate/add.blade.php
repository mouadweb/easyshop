@extends('admin.index')
@section('title',$title)
@section('content')
    <div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span>添加帮助</span>
    </div>
    <div class="mws-panel-body no-padding">
         <form action="/admin/noticecate" method="post" class="mws-form" enctype='multipart/form-data'>
                <div class="mws-form-inline">
                    <div class="mws-form-row">
                        <label class="mws-form-label">分类名</label>
                        <div class="mws-form-item">
                            <input type="text" class="small" name="cate_name">
                        </div>
                    </div>

                    <div class="mws-form-row">
                        <label class="mws-form-label">顶级分类</label>
                        <div class="mws-form-item">
                            <select class="small" name='cid'>

                                <option value='0'>请选择</option>
                                @foreach($rs as $v)
                                <option value='{{$v->id}}'>{{$v->cate_name}}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>

                    <div class="mws-form-row">
                        <label class="mws-form-label">状态</label>
                        <div class="mws-form-item clearfix">
                            <ul class="mws-form-list inline">
                                <li><label><input type="radio" name='status' value="1" checked>开启</label></li>
                                <li><label><input type="radio" name='status' value="0">禁用</label></li>
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