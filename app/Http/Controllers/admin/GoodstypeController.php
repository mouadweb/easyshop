<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Goodstype;
use App\Model\Admin\Goodsattr;
use DB;
class GoodstypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //添加商品类型列表页
        $res = Goodstype::get();
        return view('admin.goodstype.index',[
            'title'=>'商品类型列表',
            // 'request'=>$request,
            'res'=>$res,
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

        // dd($rs);
          return view('admin.goodstype.add',[
            'title'=>'商品属性添加页面'

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
         //验证不能为空
         $this->validate($request, [
            'type_name' => 'required',
        ],[
            'type_name.required' => '商品类型不为空'
        ]);
        $res = $request->except('_token');
        // dd($res);
          try{

        $data = Goodstype::create($res);


        if($data){
                return redirect('/admin/goodstype')->with('info','添加成功');
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
        $res = Goodstype::find($id);
        return view('admin.goodstype.edit',[
            'title'=>'商品类型修改修改页面',
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
        //
        $this->validate($request, [
            'type_name' => 'required',
        ],[
            'type_name.required' => '商品类型不为空'
        ]);
        $res = $request->except('_token','_method');
        try{

            $data = Goodstype::where('id',$id)->update($res);

            if($data){
                return redirect('/admin/goodstype')->with('info','修改成功');
            }else{
                return redirect('/admin/goodstype')->with('info','修改成功');
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
        //判断是否类型下有商品
        $res = DB::table('goods')->where('gtype',$id)->first();
        // dd($res);
        $rs = DB::table('goods_attr')->where('type_id',$id)->first();
        // dd($res);
        if ($res&&$rs) {
            return back()->with('error','该类型下有商品');
         }else{
                 try{
                        $res = goodstype::destroy($id);
                        if($res){
                            return redirect('/admin/goodstype')->with('info','删除成功');
                        }
                    }catch(\Exception $e){

                        return back()->with('error','删除失败');
                    }
                }

    }
}
