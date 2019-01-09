<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Noticecate;
use App\Model\Admin\Notice;
use DB;
class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $rs = Notice::all();
        $res = Noticecate::select(DB::raw('*,CONCAT(path,id) as paths'))->orderBy('paths')->get();
        foreach($res as $v){

            //path
            $ps = substr_count($v->path,',')-1;

            //拼接  分类名
            // $v->catname = str_repeat('|--',$ps).$v->catname;

            $v->cate_name = str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;',$ps).'|--'.$v->cate_name;

        }

        return view('admin.notice.index',[
            'title'=>'文章列表',
            'res'=>$res,
            'rs'=>$rs

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $rs = Noticecate::select(DB::raw('*,CONCAT(path,id) as paths'))->
        orderBy('paths')->
        get();

        // 家用电器
        // '|--'.电视

        foreach($rs as $v){

            //path
            $ps = substr_count($v->path,',')-1;

            //拼接  分类名
            // $v->catname = str_repeat('|--',$ps).$v->catname;

            $v->cate_name = str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;',$ps).'|--'.$v->cate_name;

        }

        // select *,CONCAT(path,id) as paths from category order by paths

        return view('admin.notice.add',[
            'title'=>'文章添加页面',
            'rs'=>$rs
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //进行表单验证
        /*$res = $request->all();
        dd($res);*/
         $this->validate($request, [
            'title' => 'required',
            'content' => 'required'

        ],[
            'title.required' => '标题不为空',
            'content.required' => '文章内容不为空'
        ]);
        $res = $request->except('_token');
        $res['create_time'] = time();
        try{

        $data = Notice::create($res);


        if($data){
                return redirect('/admin/notice')->with('info','添加成功');
            }

        }catch(\Exception $e){

            return back()->with('error','添加失败');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $rs = Noticecate::select(DB::raw('*,CONCAT(path,id) as paths'))->
        orderBy('paths')->
        get();
        // 家用电器
        // '|--'.电视

        foreach($rs as $v){

            //path
            $ps = substr_count($v->path,',')-1;

            //拼接  分类名
            // $v->catname = str_repeat('|--',$ps).$v->catname;

            $v->cate_name = str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;',$ps).'|--'.$v->cate_name;

        }

        $res = Notice::find($id);

        return view('admin.notice.edit',[
            'title'=>'文章修改页面',
            'res'=>$res,
            'rs'=>$rs
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
          $this->validate($request, [
            'title' => 'required',
            'content' => 'required'


        ],[
            'title.required' => '标题不为空',
            'content.required' => '文章内容不为空'

        ]);
        $res = $request->except('_token','_method');
        // dd($res);
        try{

            $data = Notice::where('id',$id)->update($res);

            if($data){
                return redirect('/admin/notice')->with('info','修改成功');
            }else{
                return redirect('/admin/notice')->with('info','修改成功');
            }

        }catch(\Exception $e){

            return back()->with('error','修改失败');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //传过来一个id 进行删除
          try{

            $res = Notice::destroy($id);

            if($res){
                return redirect('/admin/notice')->with('info','删除成功');
            }
        }catch(\Exception $e){

            return back()->with('error','删除失败');
        }

    }
}
