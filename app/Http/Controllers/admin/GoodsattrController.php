<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Model\Admin\Goodstype;
use App\Model\Admin\Goodsattr;


class GoodsattrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
           $res = Goodsattr::get();
           $rs = Goodstype::get();

           // dd($res);
           // $id = $res['type_id'];
           // dd($id);
           // $rs = Goodstype::select()->where('id',$id);
           // dd($rs);
        // paginate($request->input('num', 10));
        // $rse = DB:table('nav')->get();
        return view('admin.goodsattr.index',[
            'title'=>'商品属性列表',
            // 'request'=>$request,
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
        $rs =Goodstype::get();
        // dd($rs);
          return view('admin.goodsattr.add',[
            'title'=>'商品属性添加页面',
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
        //验证不能为空
         $this->validate($request, [
            'attr_name' => 'required',
            'attr_type' => 'required',
            'attr_values'=>'required',
            'type_id'=>'required'

        ],[
            'attr_name.required' => '属性名称不为空',
            'attr_type.required' => '属性类型不为空',
            'attr_values.required'=>'属性值不为空',
            'type_id.required'=>'商品类别类型不为空'
        ]);

        $res = $request->except('_token');
        // dd($res);
          try{

        $data = Goodsattr::create($res);


        if($data){
                return redirect('/admin/goodsattr')->with('info','添加成功');
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
        $res = Goodsattr::find($id);
        $rs = Goodstype::get();
        return view('admin.goodsattr.edit',[
            'title'=>'导航修改页面',
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
        // $res = $request->all();
        // dd($res);
         //验证不能为空
        $this->validate($request, [
            'attr_name' => 'required',
            'attr_type' => 'required',
            'attr_values'=>'required',
            'type_id'=>'required'

        ],[
            'attr_name.required' => '属性名称不为空',
            'attr_type.required' => '属性类型不为空',
            'attr_values.required'=>'属性值不为空',
            'type_id.required'=>'商品类别类型不为空'
        ]);
        $res = $request->except('_token','_method');
        try{

            $data = Goodsattr::where('id',$id)->update($res);

            if($data){
                return redirect('/admin/goodsattr')->with('info','修改成功');
            }else{
                return redirect('/admin/goodsattr')->with('info','修改成功');
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

            $res = Goodsattr::destroy($id);

            if($res){
                return redirect('/admin/goodsattr')->with('info','删除成功');
            }

        }catch(\Exception $e){

            return back()->with('error','删除失败');
        }
    }
}
