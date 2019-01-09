@extends('admin.index')
@section('title',$title)
@section('content')
    <div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span>修改资料</span>
    </div>
    <div class="mws-panel-body no-padding">
        <form action="/admin/noticecate/{{$res->id}}" method="post" class="mws-form" >
                <div class="mws-form-inline">
                    <div class="mws-form-row">
                        <label class="mws-form-label">分类名</label>
                        <div class="mws-form-item">
                            <input type="text" class="small" name='cate_name' value="{{$res->cate_name}}">
                        </div>
                    </div>

                    <div class="mws-form-row">
                        <label class="mws-form-label">顶级分类</label>
                        <div class="mws-form-item">
                            <select class="small" name='cid' disabled>

                                <option value='0'>请选择</option>

                                @foreach($rs as $v)

                                {{--
                                    //第一种
                                @if($res->pid == $v->id)
                                <option value='{{$v->id}}'  selected  >{{$v->cate_name}}</option>
                                @else
                                <option value='{{$v->id}}' >{{$v->cate_name}}</option>
                                @endif

                                --}}

                                <option value='{{$v->id}}' @if($res->cid == $v->id) selected @endif  >{{$v->cate_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="mws-form-row">
                        <label class="mws-form-label">状态</label>
                        <div class="mws-form-item clearfix">
                            <ul class="mws-form-list inline">
                                 <li><label><input type="radio" name='status' value="1" @if($res->status== 1) checked @endif>开启</label></li>
                                <li><label><input type="radio" name='status' value="0" @if($res->status== 0) checked @endif>禁用</label></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="mws-button-row">
                    {{csrf_field()}}

                    {{method_field('PUT')}}

                    <input type="submit" class="btn btn-primary" value="修改">

                </div>
            </form>
    </div>
    </div>
@endsection