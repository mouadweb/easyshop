<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Noticecate;
use DB;
class NoticecateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
         $res = Noticecate::select(DB::raw('*,CONCAT(path,id) as paths'))->orderBy('paths')->get();
        foreach($res as $v){

            //path
            $ps = substr_count($v->path,',')-1;

            //拼接  分类名
            // $v->catname = str_repeat('|--',$ps).$v->catname;

            $v->cate_name = str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;',$ps).'|--'.$v->cate_name;

        }

        return view('admin.noticecate.index',[
            'title'=>'帮助栏目列表',
            'request'=>$request,
            'res'=>$res

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

        return view('admin.noticecate.add',[
            'title'=>'分类添加页面',
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
        //这个部分是进行验证得
         $this->validate($request, [
            'cate_name' => 'required'
        ],[
            'cate_name.required' => '栏目名称不能为空'

        ]);
        $res = $request->except('_token');

        if($request->cid == '0'){

            $res['path'] = '0,';

        } else {
            //查询数据
            $rs = DB::table('notice_cate')->where('id',$request->cid)->first();
            // path.id       0, 1,
            // $res['path'] = $rs->path.$rs->id.',';
              $res['path'] = $rs->path.$rs->id.',';

        }

      $res['create_time'] = time();
       // $res = $request->all();
        // dd($res);
     //  $data = Noticecate::create($res);
     // dd($data);
        //往数据表里面进行添加
        try{

        $data = Noticecate::create($res);


            if($data){
                return redirect('/admin/noticecate')->with('info','添加成功');
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

        $res = Noticecate::find($id);

        return view('admin.noticecate.edit',[
            'title'=>'帮助修改页面',
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
        //将修改后得数据存放进数据库
    
         //这个部分是进行验证得
         $this->validate($request, [
            'cate_name' => 'required'

        ],[
            'cate_name.required' => '分类不能为空'

        ]);
        $res = $request->only('status','cate_name');
        // $res['update_time'] = time();
        // $res['update_time'] = time();
        // dd($res);
        try{

            $data = Noticecate::where('id',$id)->update($res);

            if($data){
                return redirect('/admin/noticecate')->with('info','修改成功');
            }else{
                return redirect('/admin/noticecate')->with('info','修改成功');
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
        //
        // $pathall = DB::table('notice_cate')->pluck('path');
        $path = DB::table('notice_cate')->where('id',$id)->first();
        $paths = $path->path.$id.',';
        // dd($paths);
        $res = DB::table('notice_cate')->where('path',$paths)->first();
        // dd($res);
        if (!$res) {
            try{

            $ress = Noticecate::destroy($id);

            if($ress){
                return redirect('/admin/noticecate')->with('info','删除成功');
            }

            }catch(\Exception $e){

                return back()->with('error','删除失败');
            }
        }else{
            return back()->with('error','该栏目下有内容');
        }



    }
}
