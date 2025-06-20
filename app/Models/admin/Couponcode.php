<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Couponcode extends Model
{
    //
    protected $fillable = [
        'discount',
        'couponcode'
    ];
}
