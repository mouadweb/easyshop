<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserupdateRequest;
use Hash;
use App\Model\Admin\Users;
use DB;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $res = Users::all();
        return view('admin.users.index',['res'=>$res,'title'=>'前台用户列表']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.add',['title'=>'增加前台用户']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $res = $request->except('_token','profile','repass');

        //dd($res);

        if($request->hasFile('profile')){
            //自定义名字
            $name = rand(111,999).time();

            //获取后缀
            $suffix = $request->file('profile')->getClientOriginalExtension();

            $request->file('profile')->move('./uploads',$name.'.'.$suffix);

            $res['profile'] = '/uploads/'.$name.'.'.$suffix;

        }

        //网数据表里面添加数据  hash加密
        $res['password'] = Hash::make($request->password);

        //加密 解密
        // $res['password'] = encrypt($request->password);

        $res['create_time'] = time();

        $user = DB::table('user')->where('username',$request->username)->first();

        //dd($user);


            if(Users::where('username','like', $request->username)->first()){

                return back()->with('error','用户名已存在');

            }



        try{

            $data = Users::create($res);

            //dd($data);

            if($data){
                return redirect('/admin/users')->with('info','添加成功');
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
        $res = Users::find($id);
        //dd($res);

        return view('admin.users.edit',['res'=>$res,'title'=>'修改用户资料']);
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
        $res = $request->except('_token','profile','_method');

       // dd($res);

        if($request->hasFile('profile')){
            //自定义名字
            $name = rand(111,999).time();

            //获取后缀
            $suffix = $request->file('profile')->getClientOriginalExtension();

            $request->file('profile')->move('./uploads',$name.'.'.$suffix);

            $res['profile'] = '/uploads/'.$name.'.'.$suffix;

        }

        //网数据表里面添加数据  hash加密


        //加密 解密
        // $res['password'] = encrypt($request->password);



       /* $user = DB::table('user')->where('username',$request->username)->first();

        //dd($user);


            if(Users::where('username','like', $request->username)->first()){

                return back()->with('error','用户名已存在');

            }*/


//dd($data);
        try{


                $data = Users::where('id',$id)->update($res);
            //dd($data);

            if($data){
                return redirect('/admin/users')->with('info','修改成功');
            }else{
                return redirect('/admin/users')->with('info','修改成功');
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
        try{

            $res = Users::destroy($id);
            //dd($res);

            if($res){
                return redirect('/admin/users')->with('info','删除成功');
            }

        }catch(\Exception $e){

            return back()->with('error','删除失败');
        }
    }
}
