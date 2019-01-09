<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Category;
use DB;
class CateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $cate = Category::all();

        foreach($cate as $v){

            //path  
            $ps = substr_count($v->path,',')-1;

            //拼接  分类名
            // $v->catname = str_repeat('|--',$ps).$v->catname;

            $v->cate_name = str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;',$ps).'|--'.$v->cate_name;

        }

        return view('admin.cate.index',[
            'title'=>'分类列表',
            'request'=>$request,
            'cate'=>$cate

        ]);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        //获取数据
        $cate = Category::select(DB::raw('*,concat(path,id) as paths'))->orderBy('paths')->get();

        //dd($cate);

        foreach ($cate as $v) {
            
            $ps = substr_count($v->paths,',')-1;

            $v->cate_name = str_repeat('&nbsp;', $ps*8).'|--'.$v->cate_name;

        }
        return view('admin.cate.add',[
            'title'=>'类别添加',
            'cate'=>$cate
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
        //
        $res = $request->except('_token');
        //dd($res);
        $res['create_time'] = time();
        if ($request->pid == '0') {
            $res['path'] = '0,';
        }else{
            $rs = DB::table('goods_category')->where('id',$request->pid)->first();
            $res['path'] = $rs->path.$rs->id.',';
        }

         //往数据表里面进行添加

        try{

            $data = Category::create($res);
            //DD($data);
            if($data){
                return redirect('/admin/cate')->with('success','添加成功');
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
         //获取数据
        $cates = Category::select(DB::raw('*,CONCAT(path,id) as paths'))->
        orderBy('paths')->
        get();
        foreach ($cates as $v) {
            
            $ps = substr_count($v->paths,',')-1;

            $v->cate_name = str_repeat('&nbsp;', $ps*8).'|--'.$v->cate_name;

        }
       $cate=Category::find($id);
        
        return view('admin.cate.edit',['title'=>'分类修改','cates'=>$cates,'cate'=>$cate]);
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

         $cate = $request->except('_method','_token');
         //dd($cate);
        try{

            $cates = Category::where('id',$id)->update($cate);
            //dd($cates)
            if($cates){
                return redirect('/admin/cate')->with('info','修改成功');
            }else{
                return redirect('/admin/cate')->with('info','修改成功');
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
        //$cates = Category::find($id);
        //dd($cates);
        $cate = Category::where('pid',$id)->first();
         if ($cate){
            return redirect('/admin/cate')->with('info','该分类下有子类不能删除!');
        }

        if (Category::destroy($id)) {
            return redirect('/admin/cate')->with('info','删除商品分类成功!');
        } else {
            return redirect('/admin/cate')->with('info','删除商品分类失败!');
        }
    }
}
