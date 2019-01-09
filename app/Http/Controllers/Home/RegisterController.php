<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Mail;
use Config;
use Hash;
class RegisterController extends Controller
{
    public function register()
    {
        return view('home.register.register');
    }

    public function checkmail(Request $request)
    {
       $data = $request->except('_token','repass');

        //dd($reg);
        $data['password'] = Hash::make($request->password);
        $data['token'] = str_random(40);

        //dd($data);

        $re = DB::table('user')->insertGetId($data);



        Mail::send('home.register.remind', ['id'=>$re,'token'=>$data['token'],'email'=>$data['email']], function ($m) use($data){

                $m->from(Config::get('app.email'), '星梦购物网站');

                $m->to($data['email'],$data['username'])->subject('注册网站提醒');
            });

             return view('home.register.success',['title'=>'新注册用户提醒邮件']);
    }


    public function success(Request $request)
    {
        //获取信息

        //把status 0 => 1
        $id = $request->id;

        //$data = $request->all();

        //dd($data);

        //dd($id);
        $rs = DB::table('user')->where('id',$id)->first();

        $token = $request->token;

        if($rs->token == $token){
            //$data['password'] = Hash::make($data['password']);
            $data['status'] = 1;
            $data['create_time'] = time();
            $data['points'] = 0;
            $data['profile'] = '/uploads/homeuser/default.jpg';

            $reg = DB::table('user')->where('id',$id)->update($data);

            if($reg){

                return redirect('/home/login');
            }
        }


    }


}
