<?php

namespace App\Models\admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class WinnerPrice extends Model
{
    //
    protected $fillable = [
        'lottery_id',
        'winner_position',
        'prize_name',
        'prize_amount',
        'img_name',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}

