<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Goods;
use App\Model\Admin\Category;
use App\Model\Admin\Goodstype;
use DB;

class IndexController extends Controller
{
    //
    public function index(Request $request){
        
        $goods = Goods::all();
        // dd($goods);
        $cate = DB::table('goods_category')
        ->where('pid','=','0')
        ->get();
        $erca = DB::table('goods_category')
        ->where('pid','!=','0')
        ->get();
        $category = Category::all();
        $goodstype = Goodstype::all();
        return view('home.index',[
            'title'=>'星梦购物',
            'goods'=>$goods,
            'cate'=>$cate,
            'erca'=>$erca,
            'goodstype'=>$goodstype,
            'category'=>$category
        ]);
    }

    public function sous(Request $request)
    {

        $res = Goods::orderBy('id','asc')
            ->where(function($query) use($request){
                //检测关键字
                $gname = $request->input('gname');
               
                //如果用户名不为空
                if(!empty($gname)) {
                    $query->where('gname','like','%'.$gname.'%');
                }
              
            })
        ->paginate($request->input('num', 10));
        return view('home.list',['res'=>$res,'request'=>$request]);
    }
}