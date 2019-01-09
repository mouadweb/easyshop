<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Ad;
use DB;
class AdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //轮播图列表页
        $res = Ad::all();
        return view('admin.ad.index',['res'=>$res,'title'=>'轮播图列表']);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //显示添加页面
        return view('admin.ad.add',[
            'title'=>'轮播图添加页面'
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
        // $res = $request->all();
        // dd($res);
         //验证不能为空
         $this->validate($request, [
            'ad_name' => 'required',
            'src' => 'required',
            'url'=>'required',
            'sort'=>'required',
            'title'=>'required'


        ],[
            'ad_name.required' => '轮播图名称不为空',
            'src.required' => '请上传文件',
            'url.required'=>'链接地址不为空',
            'sort.required'=>'排序不为空',
            'title.required'=>'标题不为空'

        ]);
        $res = $request->except('_token','src');

        if($request->hasFile('src')){
            //自定义名字
            $name = rand(111,999).time();

            //获取后缀
            $suffix = $request->file('src')->getClientOriginalExtension();

            $request->file('src')->move('./uploads',$name.'.'.$suffix);

            $res['src'] = '/uploads/'.$name.'.'.$suffix;

        }
        try{

        $data = Ad::create($res);


        if($data){
                return redirect('/admin/ad')->with('info','添加成功');
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
        //显示编辑页面
        $res = Ad::find($id);
        //dd($res);

        return view('admin.ad.edit',['res'=>$res,'title'=>'修改轮播']);
    }
      public function upload(Request $request)
    {
        $file = $request->file('src');
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

            $res['src'] = $filepath;
            DB::table('ad')->where('id',$id)->update($res);
            //返回文件的路径
            return  $filepath;
        }
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
            'ad_name' => 'required',
            'url'=>'required',
            'sort'=>'required',
            'title'=>'required'


        ],[
            'ad_name.required' => '轮播图名称不为空',
            'url.required'=>'链接地址不为空',
            'sort.required'=>'排序不为空',
            'title.required'=>'标题不为空'

        ]);
        $res = $request->except('_token','src','_method');
        //dd($res);
        if($request->hasFile('src')){
            //自定义名字
            $name = rand(111,999).time();

            //获取后缀
            $suffix = $request->file('src')->getClientOriginalExtension();

            $request->file('src')->move('./uploads',$name.'.'.$suffix);

            $res['src'] = '/uploads/'.$name.'.'.$suffix;
        }

        //数据表修改数据
        try{

            $data = Ad::where('id', $id)->update($res);

            if($data){
                return redirect('/admin/ad')->with('info','修改成功');
            }else{
                 return redirect('/admin/ad')->with('info','修改成功');
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

            $res = Ad::destroy($id);
            //dd($res);

            if($res){
                return redirect('/admin/ad')->with('info','删除成功');
            }

        }catch(\Exception $e){

            return back()->with('error','删除失败');
        }
    }
}
