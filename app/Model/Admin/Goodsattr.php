<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Goodsattr extends Model
{
    //

    protected $table = 'goods_attr';

    protected $primaryKey = 'id';

    /**
     * 该模型是否被自动维护时间戳
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * 不可被批量赋值的属性。
     *
     * @var array
     */
    protected $guarded = [];
     public function goodsattr()
    {
        return $this->hasMany('App\Model\Admin\Goodstype','type_id');
    }
}
