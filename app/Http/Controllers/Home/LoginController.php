<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;
use Session;
class LoginController extends Controller
{
    public function login()
    {
        return view('home.login.login',['title'=>'星梦登录']);
    }

    public function dologin(Request $request)
    {

        $user = $request->except('_token','rememberName');

        //dd($user);

        $users = DB::table('user')->where('username',$request->username)->first();

        //dd($users->username);


       // dd(session('sid'));

        if(!$users){

            return back()->with('error','用户名或者密码错误');
        }

        if(!Hash::check($request->password,$users->password)){

            return back()->with('error','用户名或者密码错误');
        }

         session(['sid' => $users->id]);

            return redirect('/');
    }



    public function forget()
    {
        return view('home.forget.forget');
    }


    public function checkphone(Request $request)

    {
        $number = $request->post('number');

        //echo($number);

        $options['accountsid']='b303ba4e395fe57637b7b499218d8318';
        $options['token']='ba4aa5c08270afa64849c181e1d13d34';

        $ucpass = new \Ucpaas($options);

        // $ucpass->getDevinfo('xml');

        //验证码
        $code = rand(111111,999999);

        session(['phonecode'=>$code]);

        //$request->session()->put('phonecode', $code);
        //$request->session()->save();
        //session
        //$cds = session('phonecode',$code);
        //$codes = session()->put(['code'=>$code]);

        //echo $cds;

        $appId = "3b70daf20bc0468c9cd739096c23c7af";

        $templateId = "406882";
        // $param=$code;

        $ucpass->templateSMS($appId,$number,$templateId,$code);

        echo $code;

    }

    public function checkcode(Request $request)
    {
        $code = $request->get('codes');
        //echo $code;
        //echo $code;
        //echo $request->session()->get('phonecode');
        //echo session("phonecode");
        $cd = session('phonecode');

        //echo $cd;
        //echo $cd;
       //dump($cd);
        //比较   跟手机收到的验证码作比较
        if($code == $cd){

            echo 1;
        } else {
            echo 0;
        }

    }

    public function doforget(Request $request)
    {
        $phone = $request->except('_token','code');

        //dd($phone);

        $phones = DB::table('user')->where('phone',$request->phone)->first();
        session(['pid' => $phones->id]);
        //session(['pname'=> $phones->username]);
         //dd($phones->id);

         if(!$phones){

            return back()->with('error','手机号不存在');
        }

        return redirect('/home/fgpass');




        //dd(session('pid'));
    }

    public function out()
    {
        session(['sid'=>'']);

        return redirect('/');
    }
}
