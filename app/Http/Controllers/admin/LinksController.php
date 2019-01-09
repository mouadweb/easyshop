<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Links;
use DB;
class LinksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //显示列表页
        $res = Links::all();
        return view('admin.links.index',['res'=>$res,'title'=>'友情链接列表']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //显示添加页面
        return view('admin.links.add',[
            'title'=>'友情链接添加页面'
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
        //对提交得数据进行验证
       /* $res = $request->all();
        dd($res);*/
          $this->validate($request, [
            'title' => 'required',
            'url' => 'required',
            'logo'=>'required',
            'desc'=>'required',
            'type'=>'required',
            'status'=>'required'


        ],[
            'title.required' => '标题不为空',
            'url.required' => '链接地址不为空',
            'logo.required'=>'请上传文件',
            'desc.required'=>'描述不为空',
            'type.required'=>'类型不为空',
            'status.required'=>'状态不为空'

        ]);
        $res = $request->except('_token','logo');

        if($request->hasFile('logo')){
            //自定义名字
            $name = rand(111,999).time();

            //获取后缀
            $suffix = $request->file('logo')->getClientOriginalExtension();

            $request->file('logo')->move('./uploads',$name.'.'.$suffix);

            $res['logo'] = '/uploads/'.$name.'.'.$suffix;

        }
        try{

        $data = Links::create($res);


        if($data){
                return redirect('/admin/links')->with('info','添加成功');
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
     public function upload(Request $request)
    {
        $file = $request->file('logo');
        $id = $request->id;
        // dump($id);
        if($file->isValid()){
            //上传文件的后缀名
            $entension = $file->getClientOriginalExtension();
            //修改名字
            $newName = date('YmdHis').mt_rand(1000,9999).'.'.$entension;
            //移动文件
            $path = $file->move('./uploads',$newName);

            $filepath = '/uploads/'.$newName;

            $res['logo'] = $filepath;
            DB::table('links')->where('id',$id)->update($res);
            //返回文件的路径
            return  $filepath;
        }
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
          //显示编辑页面
        $res = Links::find($id);
        //dd($res);
        return view('admin.links.edit',['res'=>$res,'title'=>'修改友情链接轮播']);
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
            'url' => 'required',
            'desc'=>'required',
            'type'=>'required',
            'status'=>'required'
        ],[
            'title.required' => '标题不为空',
            'url.required' => '链接地址不为空',
            'desc.required'=>'描述不为空',
            'type.required'=>'类型不为空',
            'status.required'=>'状态不为空'
        ]);
          $res = $request->except('_token','logo','_method');
        //dd($res);
        if($request->hasFile('logo')){
            //自定义名字
            $name = rand(111,999).time();

            //获取后缀
            $suffix = $request->file('logo')->getClientOriginalExtension();

            $request->file('logo')->move('./uploads',$name.'.'.$suffix);

            $res['logo'] = '/uploads/'.$name.'.'.$suffix;
        }

        //数据表修改数据
        try{

            $data = Links::where('id', $id)->update($res);

            if($data){
                return redirect('/admin/links')->with('info','修改成功');
            }else{
                 return redirect('/admin/links')->with('info','修改成功');
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
        //删除链接
         try{

            $res = Links::destroy($id);
            //dd($res);

            if($res){
                return redirect('/admin/links')->with('info','删除成功');
            }

        }catch(\Exception $e){

            return back()->with('error','删除失败');
        }
    }
}
