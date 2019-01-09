<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Nav;
use DB;
class NavController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        //
          //显示添加页
       /* $res = Nav::select()->orderBy('id')->get();
        return view('admin.nav.index',[
            'title'=>'导航栏目列表',
            'request'=>$request,
            'res'=>$res

        ]);*/
      /*  $res = $request->all();
        dd($res);*/
        // $res = Nav::select()->orderBy('id')->get();
        $res = Nav::get();

        // paginate($request->input('num', 10));
        // $rse = DB:table('nav')->get();
        return view('admin.nav.index',[
            'title'=>'导航栏目列表',
            // 'request'=>$request,
            'res'=>$res

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

         return view('admin.nav.add',[
            'title'=>'导航添加页面'

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
      /*  $res = $request->all();
        dd($res);*/
         $this->validate($request, [
            'name' => 'required',
            'url' => 'required'


        ],[
            'name.required' => '导航名称不能为空',
            'url.required' => '导航地址不能为空'

        ]);
         $res = $request->except('_token');
          try{

        $data = Nav::create($res);


        if($data){
                return redirect('/admin/nav')->with('info','添加成功');
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
        $res = Nav::find($id);

        return view('admin.nav.edit',[
            'title'=>'导航修改页面',
            'res'=>$res

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
        //网数据库里面插入数据
         //将修改后得数据存放进数据库
      /*  $res = $request->all();
        dd($res);*/
         $this->validate($request, [
            'name' => 'required',
            'url' => 'required'


        ],[
            'name.required' => '导航名称不能为空',
            'url.required' => '导航地址不能为空'

        ]);
        $res = $request->except('_token','_method');
        try{

            $data = Nav::where('id',$id)->update($res);

            if($data){
                return redirect('/admin/nav')->with('info','修改成功');
            }else{
                return redirect('/admin/nav')->with('info','修改成功');
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
         try{

            $res = Nav::destroy($id);

            if($res){
                return redirect('/admin/nav')->with('info','删除成功');
            }

        }catch(\Exception $e){

            return back()->with('error','删除失败');
        }
    }
}
