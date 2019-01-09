<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gregwar\Captcha\CaptchaBuilder;
use Gregwar\Captcha\PhraseBuilder;
use Session;
use DB;
use Hash;
use App\Model\Admin\User;

class LoginController extends Controller
{
    /**
     *  显示登录页面
     *
     *  @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('admin.login',['title'=>'后台的登录页面']);
    }

    /**
     *  处理登录的方法
     *
     *  @return \Illuminate\Http\Response
     */
    public function dologin(Request $request)
    {
        //表单验证

        //判断用户名
        $rs = DB::table('admin')->where('username',$request->username)->first();


        if(!$rs){

            return back()->with('error','用户名或者密码错误');
        }

        //判断密码
        //hash
        if (!Hash::check($request->password, $rs->password)) {

            return back()->with('error','用户名或者密码错误');
        }

        //加密解密
        /*if($request->password != decrypt($rs->password)){

            return back()->with('error','用户名或者密码错误');

        }*/

        //判断验证码
        $code = session('code');

        if($code != $request->code){
            return back()->with('error','验证码错误');
        }

        //存点信息  session
        session(['uid'=>$rs->id]);
        session(['uname'=>$rs->username]);

        return redirect('/admin');

    }

    /**
     *  验证码
     *
     *  @return \Illuminate\Http\Response
     */
    public function captcha()
    {
        $phrase = new PhraseBuilder;
        // 设置验证码位数
        $code = $phrase->build(4);
        // 生成验证码图片的Builder对象，配置相应属性
        $builder = new CaptchaBuilder($code, $phrase);
        // 设置背景颜色
        $builder->setBackgroundColor(123, 203, 230);
        $builder->setMaxAngle(25);
        $builder->setMaxBehindLines(0);
        $builder->setMaxFrontLines(0);
        // 可以设置图片宽高及字体
        $builder->build($width = 90, $height = 35, $font = null);
        // 获取验证码的内容
        $phrase = $builder->getPhrase();
        // 把内容存入session
        session(['code'=>$phrase]);
        // 生成图片
        header("Cache-Control: no-cache, must-revalidate");
        header("Content-Type:image/jpeg");
        $builder->output();
    }

    /**
     *  修改头像页面.
     *
     *  @return \Illuminate\Http\Response
     */
    public function profile()
    {
        return view('admin.profile',['title'=>'修改头像']);
    }

    /**
     *  修改头像方法
     *
     *  @return \Illuminate\Http\Response
     */
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
            DB::table('admin')->where('id',session('uid'))->update($res);
            //返回文件的路径
            return  $filepath;

        }

    }

    //退出
    public function logout()
    {
        //清空session
        session(['uid'=>'']);

        return redirect('/admin/login');
    }

     public function passchange()
    {

        return view('admin.user.passchange',['title'=>'修改密码']);
    }

     public function xpass(Request $request){
        //echo 123;
        $rs=DB::table('admin')->where('id',session('uid'))->first();

        //dd($rs);
        //dd($rs->phone);
        //dd($rs->name);
        //    dd($rs->password);
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




            $data=DB::table('admin')->where('id',session('uid'))->update($res);

            if($data){
                return redirect('/admin')->with('info','修改成功');
            }




        }catch(\Exception $e){




            return back()->with('error','修改失败');
        }








   }

}