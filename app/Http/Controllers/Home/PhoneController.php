<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class PhoneController extends Controller
{
    public function index()
    {
        return view('home.person.phone',['title'=>'绑定手机']);
    }

     public function dophone(Request $request)
    {
        $phone = $request->except('_token','code');
        //dd($phone);

        $data = DB::table('user')->where('id',session('sid'))->update($phone);


        return redirect('/home/anquan');
    }
}
