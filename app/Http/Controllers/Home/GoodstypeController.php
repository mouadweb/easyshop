<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Model\Admin\Goodstype;
use App\Model\Admin\Goods;
use App\Model\Admin\Goods_photos;
class GoodstypeController extends Controller
{
    public function index(Request $request,$id){
        $type = DB::table('goods_type')->where('id',$id)->first();
        $goodstype = DB::table('goods')->where('gtype',$id)->paginate(3);
        $guess = DB::table('goods')->where('gtype',$id)->take(5)->get();
        return view('home.nav.goodstype',['title'=>'商品列表','goodslist'=>$goodstype,'guess'=>$guess,'type'=>$type]);
    }
    public function father(Request $request,$id){
        $type = DB::table('goods_category')->where('id',$id)->first();
        $ids = DB::table('goods_category')->where('pid','=',$id)->pluck('id');
        // dd($id->toArray());
        // $arr = array_collapse($id);
       /* $users = DB::table('users')
                    ->whereIn('id', [1, 2, 3])
                    ->get();*/
        $goodsfather = DB::table('goods')->whereIn('gcate',$ids->toArray())->paginate(3);
        // dd($goodsfather);
        $guess = DB::table('goods')->whereIn('gcate',$ids->toArray())->take(5)->get();
        return view('home.nav.goodsfather',[
            'title'=>'商品分类',
            'goodsfather'=>$goodsfather,
            'type'=>$type,
            'guess'=>$guess
        ]);
    }
    public function son(Request $request,$id){
        $type = DB::table('goods_category')->where('id',$id)->first();
        $fathertype = DB::table('goods_category')->where('id',$type->pid)->first();
        $goodsson = DB::table('goods')->where('gcate',$id)->paginate(3);
        $guess = DB::table('goods')->where('gcate',$id)->take(5)->get();
        return  view('home.nav.goodsson',[
            'title','商品分类',
            'goodsson'=>$goodsson,
            'type'=>$type,
            'fathertype'=>$fathertype,
            'guess'=>$guess
    ]);
    }
}
