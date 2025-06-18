<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

class Carousel extends Model
{
    //
    protected $table ="carousels";
    protected $fillable = [
        'title',
        'path',
        'is_active'
    ];
}
