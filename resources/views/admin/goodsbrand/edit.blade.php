@extends('admin.index')
@section('title',$title)
@section('content')
    <div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span>修改商品品牌</span>
    </div>
    <div class="mws-panel-body no-padding">
        <form class="mws-form" action="/admin/goodsbrand/{{$res->id}}" method="post" enctype="multipart/form-data">
            <div class="mws-form-inline">
                <div class="mws-form-row">
                    <label class="mws-form-label">品牌名称</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" title="" name="brand_name" value="{{$res['brand_name']}}">
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">品牌url</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" title="" name="brand_url" value="{{$res['brand_url']}}">
                    </div>
                </div>
                <div class="mws-form-row" style="width: 490px;" >
                    <label class="mws-form-label">品牌LOGO</label>
                    <div class="mws-form-item">
                       <img src="{{$res['brand_logo']}}" alt="" width='80px' height="80px">
                        <input type="file" class="small" title="" name="brand_logo">
                    </div>
                </div>
                 <div class="mws-form-row" style="width: 490px;" >
                        <label class="mws-form-label">品牌描述</label>
                        <div class="mws-form-item">
                            <textarea rows="3" cols="20" name="brand_desc"  style="width: 410px;">{{$res['brand_desc']}}</textarea>
                        </div>
                    </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">品牌排序</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" title="" name="sort" value="{{$res['sort']}}">
                    </div>
                </div>
                <div class="mws-form-row">
                        <label class="mws-form-label">品牌状态</label>
                        <div class="mws-form-item clearfix">
                            <ul class="mws-form-list inline">
                                <li><label><input type="radio" name='status' value="1" @if($res->status== 1) checked @endif>显示</label></li>
                                <li><label><input type="radio" name='status' value="2" @if($res->status== 2) checked @endif>隐藏</label></li>
                            </ul>
                        </div>
                    </div>
                </div>
            <div class="mws-button-row">
                {{csrf_field()}}
                {{method_field('PUT')}}
                <input type="submit" value="提交" class="btn btn-warning">
            </div>
        </form>
    </div>
    </div>
@endsection