<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Model\Home\User;
use Hash;
use App\Model\Admin\Order;
class PersonalController extends Controller
{
    public function index()
    {
        return view('home.person.person',['title'=>'个人中心']);
    }


    public function xiu(Request $request)
    {

        //$person = $request->all();
        //dd($person);
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

            $data = User::where('id', session('sid'))->update($res);

            if($data){
                return redirect('/home/person')->with('info','修改成功');
            }else{
                 return redirect('/home/person')->with('info','修改成功');
            }

        }catch(\Exception $e){

            return back()->with('error','修改失败');
        }

    }


    public function upload(Request $request)
    {
        //获取上传的文件对象
        //

        $file = $request->file('profile');
       //dd($res);
        //dd($file);
        if(!$file){

           return back()->with('error','上传错误');
        }
        //判断文件是否有效
        if($file->isValid()){
            //上传文件的后缀名
            $entension = $file->getClientOriginalExtension();
            //修改名字
            $newName = date('YmdHis').mt_rand(1000,9999).'.'.$entension;
            //移动文件
            $path = $file->move('./uploads',$newName);

            $filepath = '/uploads/'.$newName;

            $res['profile'] = $filepath;
            DB::table('user')->where('id',session('sid'))->update($res);
            //返回文件的路径
            return  $filepath;

        }

    }

    public function anquan()
    {
        return view('home.person.anquan',['title'=>'账户安全']);
    }

    public function change()
    {
        return view('home.person.change',['title'=>'修改密码']);
    }

     public function xpass(Request $request){
        //echo 123;
        $rs=DB::table('user')->where('id',session('sid'))->first();

        //dd($rs);
        //dd($rs->phone);
        //dd($rs->name);
         //dd($request->password);
        if(!$request->password){
            return back()->with('error','请输入原密码');
        }
        if(!$request->xpass){
            return back()->with('error','请输入新密码');
        }

        if(!$request->qpass){
            return back()->with('error','请确认密码');
        }
       if (!Hash::check($request->password, $rs->password)) {
            //dd($rs->password);
            return back()->with('error','原密码错误');
        }

        if ($request->xpass != $request->qpass) {

            return back()->with('error','两次密码不一致');
        }


        $rs->password =Hash::make($request->xpass);
        //dd();
        $res = ['password'=>$rs->password];
        try{




            $data=DB::table('user')->where('id',session('sid'))->update($res);

            if($data){
                return redirect('/home/anquan')->with('info','修改成功');
            }




        }catch(\Exception $e){




            return back()->with('error','修改失败');
        }








   }

   public function dingdan()
   {

    $ding = DB::table('orders')->where('user_id',session('sid'))->get();
    //dd($ding);


     return view('home.person.dingdan',['title'=>'我的订单管理',
        'ding'=>$ding

    ]);


   }
}
