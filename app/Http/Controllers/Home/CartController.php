<?php

namespace App\Http\Controllers\home;

use App\Model\Admin\UserAddress;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Goods;
use App\Model\Admin\OrderDetail;
use App\Model\Admin\Order;
use App\Model\home\Addrs;
use DB;
class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //判断用户是否登录
        $sid = session('sid');
        //dd($sid);
        if(empty($sid)){
             return redirect('/home/login');

        }

        //多表联查
       $goods = DB::table('goods')
            ->join('gmiddle', 'gmiddle.gid', '=', 'goods.id')
            ->join('order_detail', 'order_detail.pic_id', '=', 'gmiddle.id')
            ->select('order_detail.id', 'order_detail.size','order_detail.city','order_detail.num','order_detail.uid','gmiddle.middle','goods.price','goods.gweight','dw','goods.gname','gmiddle.gid')
            ->get();


        //dd($goods);
        return view('home.cart.index',[
            'title'=>'购物车',
            'goods'=>$goods
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req )
    {
        //
        // $gid = $req->get('gid');
        $gid = $req -> gid;
        session(['gid' => $gid]);
        // dump(session('gids'));
        // dump($gid);
        /*$goods = [];
        foreach ($gid as $v) {
             $gs = DB::table('goods')->where('id',$v)->get();
             $goods[] = $gs;
        }*/
        //dump($goods);
       
 /*       return view('home.cart.add',['goods'=>$goods]);*/
        /*foreach ($gid as  $v) {
            $goods = DB::table('goods')->where('id',$v)->get();
        }*/
        
        /*$orders = OrderDetail::where('id',$id)->get();*/
       
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        //
        // dump(session('gid'));
        $gid = session('gid');
        $gidArr = explode(',', $gid);
        $goods = [];
        $totals = 0;
        $count = 0;
        foreach ($gidArr as $key => $value) {
//            $goods[] = DB::table('goods')->where('id',$value)->first();
            $goods[] =DB::table('goods')
                ->join('gmiddle', 'gmiddle.gid', '=', 'goods.id')
                ->join('order_detail', 'order_detail.pic_id', '=', 'gmiddle.id')
                ->select( 'order_detail.num', 'order_detail.uid', 'gmiddle.middle', 'goods.price', 'goods.gname','gmiddle.gid')
                ->where('gmiddle.gid',$value)->first();
            $totals += $goods[$key]->num * $goods[$key]->price;
            $count += $goods[$key]->num;
        }

        $user_id = session('sid');

        $addresses = UserAddress::where('user_id', $user_id)->get();

        //取出地址信息




        // dump($goodsData);


         // $gid = $req->gid;
         // dd($gid);
        // $goods = DB::table('goods')->where('id',$v)->get();

        return view('home.cart.add',['goods'=>$goods, 'total' => $totals, 'addresses' => $addresses, 'count' => $count,'gid'=>$gid]);
    }   
     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function sh(Request $request)
    {
        //
        $id = session('sid');
        $res = $request->all();
       
        
        dd($res);
        $result = Addrs::where('user_id',$id)->create($res);
        if($result){
            echo 1;
        }else{
            echo 0;
        }
        
        /*redirect('/home/cart/create');
*/
        
    }
     public function shadd(Request $request)
    {
        //
      /*  $id = session('sid');
        $res = $request->all();
        dd($res);
        $res['user_id'] = $id;
        $res['addr'] = $res['ct'].$res['dz'];
        // $res = $res->except('ct','dz');
        $result = Order::create($res);
        redirect('/home/cart/create');*/
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function del(Request $req)
    {
        //
        $id = $req->id;
        //dd($id);
        $res = DB::table('order_detail')->where('id',$id)->delete();
        if($res){

            echo 1;
        } else {

            echo 0;
        }
    }
}
