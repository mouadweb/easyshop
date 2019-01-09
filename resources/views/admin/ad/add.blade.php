@extends('admin.index')
@section('title',$title)
@section('content')
    <div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span>{{$title}}</span>
    </div>
    <div class="mws-panel-body no-padding">
        <form class="mws-form" action="/admin/ad" method="post" enctype="multipart/form-data">
            <div class="mws-form-inline">
                <div class="mws-form-row">
                    <label class="mws-form-label">轮播图名称</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" title="" name="ad_name" >
                    </div>
                </div>
                 <div class="mws-form-row" style="width: 490px;" >
                    <label class="mws-form-label">上传轮播图</label>
                    <div class="mws-form-item">
                        <input type="file" class="small" title="" name="src">
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">链接地址</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" title="" name="url">
                    </div>
                </div>
                <div class="mws-form-row">
                      <label class="mws-form-label">排序</label>
                        <div class="mws-form-item">
                            <select class="small" name='sort'>
                                <option value='1'>1</option>
                                <option value='2'>2</option>
                                <option value='3'>3</option>
                                <option value='4'>4</option>
                                <option value='5'>5</option>
                            </select>
                        </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">标题</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" title="" name="title" >
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