<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Goods;
use App\Model\Admin\Category;
use App\Model\Admin\Goodstype;
use App\Model\Admin\Goodsbrand;
use App\Model\Admin\Goodsimg;
use App\Model\Admin\Photoer;
use App\Model\Admin\Gmiddle;
use DB;

class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $res = Goods::all();
        return view('admin.goods.index',[
            'title'=>'商品的列表页',
            'res'=>$res,
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
        $rs = Category::select(DB::raw('*,CONCAT(path,id) as path'))->
        orderBy('path')->
        get();

        foreach($rs as $v){

            $ps = substr_count($v->path,',')-1;
            //拼接  分类名

            $v->cate_name = str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;',$ps).'|--'.$v->cate_name;
        }

        $types = Goodstype::all();
        $brands = Goodsbrand::all();

        return view('admin.goods.add',[
            'title'=>'商品的添加页面',
            'rs'=>$rs,
            'types'=>$types,
            'brands'=>$brands
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'gname' => 'required',
            'price' => 'required',
            'content'=>'required',
        ],[
            'gname.required' => '商品名不为空',
            'price.required' => '商品价格不为空',
            'content.required'=>'详情不为空',
        ]);

        $res = $request->except('_token','middle','small');
        // dd($res);

        if($request->hasFile('gimg')){

            //自定义名字
            $name = rand(111,999).time();

            //获取后缀
            $suffix = $request->file('gimg')->getClientOriginalExtension();

            $request->file('gimg')->move('./uploads',$name.'.'.$suffix);

            $res['gimg'] = '/uploads/'.$name.'.'.$suffix;
        }

        if($request->hasFile('glarge')){

            //自定义名字
            $namel = rand(111,999).time();

            //获取后缀
            $suffixl = $request->file('glarge')->getClientOriginalExtension();

            $request->file('glarge')->move('./uploads',$namel.'.'.$suffixl);

            $res['glarge'] = '/uploads/'.$namel.'.'.$suffixl;

        }

        $rs = Goods::create($res);
        // dd($rs);
        $id = $rs->id;
         //模型关联  一对多
        
        //模型关联  一对多
        if($request->hasFile('small')){

            $files = $request->file('small'); //$_FILES

            $arrs = [];
            foreach($files as $ks => $vs){

                $ars = [];

                $ars['gid'] = $id;

                //设置名字
                $names = rand(1111,9999).time();

                //后缀
                $suffixs = $vs->getClientOriginalExtension();

                //移动
                $vs->move('./uploads', $names.'.'.$suffixs);

                $ars['small'] = '/uploads/'.$names.'.'.$suffixs;

                $arrs[] = $ars;
            }
        }

        //模型关联  一对多
        if($request->hasFile('middle')){

            $filem = $request->file('middle'); //$_FILES

            $arrm = [];
            foreach($filem as $km => $vm){

                $arm = [];

                $arm['gid'] = $id;

                //设置名字
                $namem = rand(1111,9999).time();

                //后缀
                $suffixm = $vm->getClientOriginalExtension();

                //移动
                $vm->move('./uploads', $namem.'.'.$suffixm);

                $arm['middle'] = '/uploads/'.$namem.'.'.$suffixm;

                $arrm[] = $arm;
            }
        }

        //一对多
        $data = Goods::find($id);
        try{

            // $gs = $data->gis()->create($res);
            $sma = $data->small()->createMany($arrs);
            $mid = $data->middle()->createMany($arrm);
            
            if($sma){
                return redirect('/admin/goods')->with('info','添加成功');
            }

        }catch(\Exception $e){

            return back()->with('error','添加失败');
        }
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
        $res = Photoer::destroy($id);
        $rs = Gmiddle::destroy($id);

        if($res){

            echo 1;
        } else {

            echo 0;
        }
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
        $rs = Category::select(DB::raw('*,CONCAT(path,id) as path'))->
        orderBy('path')->
        get();

        foreach($rs as $v){

            $ps = substr_count($v->path,',')-1;
            //拼接  分类名

            $v->cate_name = str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;',$ps).'|--'.$v->cate_name;
        }

        $res = Goods::find($id);
        $types = Goodstype::all();
        $brands = Goodsbrand::all();

        $gimgs = Goodsimg::where('gid',$id)->get();
        $photoer = Photoer::where('gid',$id)->get();
        $gmiddle = Gmiddle::where('gid',$id)->get();

        return view('admin.goods.edit',[
            'title'=>'商品的修改页面',
            'rs'=>$rs,
            'res'=>$res,
            'gimgs'=>$gimgs,
            'types'=>$types,
            'brands'=>$brands,
            'photoer'=>$photoer,
            'gmiddle'=>$gmiddle
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
            'gname' => 'required',
            'price' => 'required',
            'content'=>'required',
        ],[
            'gname.required' => '商品名不为空',
            'price.required' => '商品价格不为空',
            'content.required'=>'详情不为空',
        ]);
        //表单验证

        $res = $request->except('_token','_method','gimg','method','small','glarge','middle');

        $data = Goods::where('id',$id)->update($res);

        if($request->hasFile('gimg')){

            // $file = $request->file('gimg'); //$_FILES
            // dd($file);
            //自定义名字
            $name = rand(111,999).time();

            //获取后缀
            $suffix = $request->file('gimg')->getClientOriginalExtension();

            $request->file('gimg')->move('./uploads',$name.'.'.$suffix);

            $res['gimg'] = '/uploads/'.$name.'.'.$suffix;

        }

        if($request->hasFile('glarge')){

            // $file = $request->file('glarge'); //$_FILES
            // dd($file);
            //自定义名字
            $namel = rand(111,999).time();

            //获取后缀
            $suffixl = $request->file('glarge')->getClientOriginalExtension();

            $request->file('glarge')->move('./uploads',$namel.'.'.$suffixl);

            $res['glarge'] = '/uploads/'.$namel.'.'.$suffixl;

        }
        //模型关联  一对多
        /*$rsm = Photoer::where('gid',$id)->get();

        foreach($rsm as $val){

            unlink('.'.$val);
        }*/

        if($request->hasFile('small')){

            $files = $request->file('small'); //$_FILES

            $arrs = [];
            foreach($files as $ks => $vs){

                $ars = [];

                $ars['gid'] = $id;

                //设置名字
                $names = rand(1111,9999).time();

                //后缀
                $suffixs = $vs->getClientOriginalExtension();

                //移动
                $vs->move('./uploads', $names.'.'.$suffixs);

                $ars['small'] = '/uploads/'.$names.'.'.$suffixs;

                $arrs[] = $ars;
            }
            $rs = Photoer::where('gid',$id)->insert($arrs);
        }

        //模型关联  一对多
/*        $rsg = Gmiddle::where('gid',$id)->get();

        foreach($rsg as $vg){

            unlink('.'.$vg);
        }*/

        if($request->hasFile('middle')){

            $filem = $request->file('middle'); //$_FILES

            $arrm = [];
            foreach($filem as $km => $vm){

                $arm = [];

                $arm['gid'] = $id;

                //设置名字
                $namem = rand(1111,9999).time();

                //后缀
                $suffixm = $vm->getClientOriginalExtension();

                //移动
                $vm->move('./uploads', $namem.'.'.$suffixm);

                $arm['middle'] = '/uploads/'.$namem.'.'.$suffixm;

                $arrm[] = $arm;
            }
            $rs = Gmiddle::where('gid',$id)->insert($arrm);
        }

        try{

            $data = goods::where('id', $id)->update($res);

            if($data){
                return redirect('/admin/goods')->with('info','修改成功');
            }else{
                 return redirect('/admin/goods')->with('info','修改成功');
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
        //
        
        $goods = Goods::where('id',$id)->first();
        // dd($goods);
        $goods->delete();
        // $goods->gis()->delete();
        $goods->small()->delete();
        $goods->middle()->delete();
        
        return redirect('/admin/goods')->with('info','删除成功');
    }
}
