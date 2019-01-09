<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Goods;
use App\Model\Admin\Photoer;
use App\Model\Admin\Gmiddle;
use App\Model\Admin\Category;
use App\Model\Admin\Goodsattr;
use App\Model\Admin\OrderDetail;
use DB;

class XqController extends Controller
{
    //
    public function xq(Request $request){

        $id = $request->id;

        $goods = DB::table('goods')->where('id',$id)->get();
        $gd = Goods::all();
        
        foreach($goods as $vg)
        {
            $type_id = $vg->gtype;
            //点击查看商品详情 则修改goods数据库的goods_show  +1
            $num = $vg->gshow;
            $num ++;
            Goods::where('id',$id)->update(['gshow'=>$num]);
            // dd($type_id);
        }
        $middle = Gmiddle::all();
        $photoer = Photoer::all();
        $goodsattr = DB::table('goods_attr')->where('type_id',$type_id)->value('attr_values');
        $gattr = explode(',' , $goodsattr);
        return view('home.xq',[
            'photoer'=>$photoer,
            'goods'=>$goods,
            'gd'=>$gd,
            'middle'=>$middle,
            'gattr'=>$gattr
        ]);
    }

    public function store(Request $request)
    {
        // return view('home.cate',['title'=>'购物车']);
        $parse = $request->all();
        if(session('sid')){
            $uid = session('sid');
            $parse['uid']=$uid;
            //判断库存
            $res = OrderDetail::create($parse);
            // dd($res);
            if($res){
                echo 1;
            }
        }else{
            echo 0;
        }
    }
}
