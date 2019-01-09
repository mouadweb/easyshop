<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    protected $fillable = [
        'hcity',
        'hproper',
        'harea',
        'address',
        'contact_name',
        'contact_phone',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getFullAddressAttribute()
    {
        return "{$this->hcity}{$this->hproper}{$this->harea}{$this->address}";
    }
}
