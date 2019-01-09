<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserupdateRequest;
use Hash;
use App\Model\Admin\User;
use App\Model\Admin\Role;
use DB;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $res = User::all();
        return view('admin.user.index',['res'=>$res,'title'=>'用户列表']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.user.add',['title'=>'添加管理员']);
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

        $user = DB::table('admin')->where('username',$request->username)->first();

        //dd($user);


            if(User::where('username','like', $request->username)->first()){

                return back()->with('error','用户名已存在');

            }



        try{

            $data = User::create($res);

            if($data){
                return redirect('/admin/user')->with('info','添加成功');
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
        $res = User::find($id);
        //dd($res);

        return view('admin.user.update',['res'=>$res,'title'=>'修改资料']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserupdateRequest $request, $id)
    {
        /*$res = $request->all();
        dd($res);*/
        $res = $request->except('_token','profile','_method');
        //dd($res);
        if($request->hasFile('profile')){
            //自定义名字
            $name = rand(111,999).time();

            //获取后缀
            $suffix = $request->file('profile')->getClientOriginalExtension();

            $request->file('profile')->move('./uploads',$name.'.'.$suffix);

            $res['profile'] = '/uploads/'.$name.'.'.$suffix;

        }

        //数据表修改数据
        try{

            $data = User::where('id', $id)->update($res);

            if($data){
                return redirect('/admin/user')->with('info','修改成功');
            }else{
                 return redirect('/admin/user')->with('info','修改成功');
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

            $res = User::destroy($id);
            //dd($res);

            if($res){
                return redirect('/admin/user')->with('info','删除成功');
            }

        }catch(\Exception $e){

            return back()->with('error','删除失败');
        }
    }


    //用户添加角色的页面

    public function user_role(Request $request)
    {
        //根据id查询用户
        $id = $request->id;

        //dd($id);

        $res = User::find($id);

        //dd($res->roles);
        $info = [];
        foreach($res->roles as $k=>$v){

            $info[] = $v->id;
        }

        // dd($info);

        //查询所有的角色
        $roles = Role::all();


        return view('admin.user.user_role',[
            'title'=>'用户添加角色的页面',
            'res'=>$res,
            'roles'=>$roles,
            'info'=>$info
        ]);
    }

    public function do_user_role(Request $request)
    {
        $id = $request->id;
        //dd($id);
        $res = $request->role_id;
       // dd($res);
        //删除原来的角色
        DB::table('user_role')->where('user_id',$id)->delete();

        $arr = [];
        foreach($res as $k => $v){
            $rs = [];

            $rs['user_id'] = $id;
            $rs['role_id'] = $v;

            $arr[] = $rs;
        }
        /*dump($arr);
        die;*/

        //往数据表里面插入数据
        $data = DB::table('user_role')->insert($arr);

        if($data){

            return redirect('/admin/user')->with('info','添加成功');
        }

    }

    public function remind()
    {
        return view('admin.user.remind',['title'=>'用户权限提示页面']);
    }
}
