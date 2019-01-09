<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
     /**
     * 与模型关联的数据表
     *
     * @var string
     */
    protected $table = 'orders';

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
    

     public function orderGetUser()
        {
        return $this->hasMany('App\Model\Admin\User','user_id', 'id');
        }


}
