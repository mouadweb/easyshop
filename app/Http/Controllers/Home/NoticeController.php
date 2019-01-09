<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Notice;
use App\Model\Admin\Noticecate;
use DB;
class NoticeController extends Controller
{
    //
    public function index(Request $request){
        $id  = $request->id;
        // dd($id);
        //父亲
        // $rs = Noticecate::where('id',$id);
        $rsf = DB::table('notice_cate')->where('id','=',$id)->first();
        $cid = $rsf->cid;
        // dd($cid);
        $rs = DB::table('notice_cate')->where('id','=',$cid)->first();
        // dd($rs);''
        //儿子
        // $res = Notice::where('cate_id',$id);
        $res = DB::table('notice')->where('cate_id','=',$id)->first();

        // dd($res);
        //全部栏目
        // $notice= Noticecate::all();
        $notice=DB::table('notice_cate')->get();
        // dd($notice);
        return view('home.notice',['resone'=>$res,'rsone'=>$rs,'noticeone'=>$notice]);

    }
}
