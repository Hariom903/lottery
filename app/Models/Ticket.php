<?php

namespace App\Models;

use App\Models\admin\Lottery;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{

    protected $fillable = [
        'user_id',
        'lottery_id',
        'ticket_number'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function lottery()
{
    return $this->belongsTo(Lottery::class);
}
}
