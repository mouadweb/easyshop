
<?php

namespace App\Http\Controllers\admin;

use App\Model\Admin\UserAddress;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Order;
use App\Model\Admin\Users;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $order = Order::all();
        //dd($order);
        return view('admin.order.index',[
            'title'=>'订单',
            'order'=>$order
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = session('sid');
        $address = UserAddress::where('user_id', $user_id)->first();
        $data = $request->only(['sum', 'count', 'umsg']);
        $data['rec'] = $address->contact_name;
        $data['tel'] = $address->contact_phone;
        $data['addr'] = $address->full_address;
        $data['status'] = 1;
        $data['create_time'] = time();
        $data['user_id'] = $user_id;
        Order::create($data);
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
        $user = Users::find($id);
        //dd($user);
        $order = Order::find($id);
        return view('admin.order.edit',[
            'title'=>'修改',
            'user'=>$user,
            'order'=>$order
        ]);
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
            $this->validate($request, [
            'rec' => 'required',
            'tel' => 'required',
            'sum'=>'required',
            'addr'=>'required'
        ],[
            'rec.required' => '收货人不能为空',
            'addr.required' => '收货地址不能为空',
            'sum.required'=>'金额不能为空',
            'tel.required'=>'联系电话不能为空'

        ]);

        $res = $request->except('_token','_method');

        //dd($res);

         try{

            $data = Order::where('id', $id)->update($res);

            if($data){
                return redirect('/admin/order')->with('info','修改成功');
            }else{
                 return redirect('/admin/order')->with('info','修改成功');
            }

        }catch(\Exception $e){

            return back()->with('error','修改失败');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
         try{

            $res =Order::destroy($id);
            //dd($res);

            if($res){
                return redirect('/admin/order')->with('info','删除成功');
            }

        }catch(\Exception $e){

            return back()->with('error','删除失败');
        }
    }
}
