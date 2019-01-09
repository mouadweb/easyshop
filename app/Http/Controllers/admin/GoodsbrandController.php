<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Goodsbrand;
use DB;
class GoodsbrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $res = Goodsbrand::all();
        return view('admin.goodsbrand.index',['res'=>$res,'title'=>'商品品牌列表']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //显示添加页面
         return view('admin.goodsbrand.add',[
            'title'=>'品牌添加页面'
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
      /* $res = $request->all();
        dd($res);*/
         $this->validate($request, [
            'brand_name' => 'required',
            'brand_url' => 'required',
            'brand_logo'=>'required',
            'brand_desc'=>'required',
            'sort'=>'required',
            'status'=>'required'
        ],[
            'brand_name.required' => '品牌名不能为空',
            'brand_url.required'=>'URL地址不能为空',
            'brand_logo.required'  => '请上传图片',
            'brand_desc.required'  => '品牌描述不能为空',
            'sort.required'=>'排序不能为空',
            'status.required'=>'状态不能为空'
        ]);
        $res = $request->except('_token','brand_logo');
        if($request->hasFile('brand_logo')){
            //自定义名字
            $name = rand(111,999).time();
            //获取后缀
            $suffix = $request->file('brand_logo')->getClientOriginalExtension();
            //移动到指定文件夹
            $request->file('brand_logo')->move('./uploads',$name.'.'.$suffix);
            //把新的路径存储进去
            $res['brand_logo'] = '/uploads/'.$name.'.'.$suffix;

        }
         try{

            $data = Goodsbrand::create($res);

            if($data){
                return redirect('/admin/goodsbrand')->with('info','添加成功');
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
        //显示编辑页面也就是修改页面
         $res = Goodsbrand::find($id);
        return view('admin.goodsbrand.edit',['res'=>$res,'title'=>'修改商品品牌']);
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
        //把数据放进去
        // $res= $request->all();
        // dd($res);
          $this->validate($request, [
            'brand_name' => 'required',
            'brand_url' => 'required',
            'brand_desc'=>'required',
            'sort'=>'required'
        ],[
            'brand_name.required' => '品牌名不能为空',
            'brand_url.required'=>'URL地址不能为空',
            'brand_desc.required'  => '品牌描述不能为空',
            'sort.required'=>'排序不能为空',
        ]);
        $res = $request->except('_token','brand_logo','_method');
        //dd($res);
        if($request->hasFile('brand_logo')){
            //自定义名字
            $name = rand(111,999).time();

            //获取后缀
            $suffix = $request->file('brand_logo')->getClientOriginalExtension();

            $request->file('brand_logo')->move('./uploads',$name.'.'.$suffix);

            $res['brand_logo'] = '/uploads/'.$name.'.'.$suffix;

        }

        //数据表修改数据
        try{

            $data = Goodsbrand::where('id', $id)->update($res);

            if($data){
                return redirect('/admin/goodsbrand')->with('info','修改成功');
            }else{
                 return redirect('/admin/goodsbrand')->with('info','修改成功');
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
        //删除品牌
         try{

            $res = Goodsbrand::destroy($id);
            //dd($res);

            if($res){
                return redirect('/admin/goodsbrand')->with('info','删除成功');
            }

        }catch(\Exception $e){

            return back()->with('error','删除失败');
        }
    }
}
