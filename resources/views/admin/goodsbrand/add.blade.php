@extends('admin.index')
@section('title',$title)
@section('content')
    <div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span>添加品牌</span>
    </div>
    <div class="mws-panel-body no-padding">
         <form action="/admin/goodsbrand" method="post" class="mws-form" enctype='multipart/form-data'>
                <div class="mws-form-inline">
                    <div class="mws-form-row">
                        <label class="mws-form-label">品牌名称</label>
                        <div class="mws-form-item">
                            <input type="text" class="small" name='brand_name'>
                        </div>
                    </div>

                    <div class="mws-form-row">
                        <label class="mws-form-label">品牌URL</label>
                        <div class="mws-form-item">
                            <input type="text" class="small" name='brand_url'>
                        </div>
                    </div>
                     <div class="mws-form-row" style="width: 490px;" >
                        <label class="mws-form-label">品牌LOGO</label>
                        <div class="mws-form-item">
                            <input type="file" class="small" title="" name="brand_logo">
                        </div>
                    </div>
                    <div class="mws-form-row" style="width: 490px;" >
                        <label class="mws-form-label">品牌描述</label>
                        <div class="mws-form-item">
                            <!-- <input type="file" class="small" title="" name="brand_logo"> -->
                            <textarea rows="3" cols="20" name="brand_desc"  style="width: 410px;" placeholder="请输入品牌描述"></textarea>                            </textarea>
                        </div>
                    </div>
                    <div class="mws-form-row" style="width: 490px;" >
                        <label class="mws-form-label">品牌排序</label>
                        <div class="mws-form-item">
                            <input type="text" class="small" name='sort'>
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">品牌状态</label>
                        <div class="mws-form-item clearfix">
                            <ul class="mws-form-list inline">
                                <li><label><input type="radio" name='status' value="1" checked>显示</label></li>
                                <li><label><input type="radio" name='status' value="2">隐藏</label></li>
                            </ul>
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