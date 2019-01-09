<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;
class PassController extends Controller
{
    public function fgpass()
    {
        return view('home.forget.xpass');
    }

    public function xpass(Request $request)
    {
        $pass = $request->except('_token','code');

        //dd($pass);

        //dd($rpass);
        //$password = null;
        $password = DB::table('user')->where('id',session('pid'))->first();

        //($password);

        if($request->rpass != $request->xpass){

            return back()->with('error','两次密码不一致');
        }

        $password ->password = Hash::make($request->xpass);

        $res = ['password'=>$password->password];

        try{




            $data=DB::table('user')->where('id',session('pid'))->update($res);

            if($data){
                return redirect('/home/login');
            }




        }catch(\Exception $e){




            return back()->with('error','修改失败');
        }
        //$xpass =Hash::make($request->xpass);
        //dd($password);
    }
}
