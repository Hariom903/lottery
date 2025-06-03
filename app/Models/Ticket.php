<?php

namespace App\Models;

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
}
