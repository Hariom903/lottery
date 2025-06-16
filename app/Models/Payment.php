<?php

namespace App\Models;

use App\Models\admin\Lottery;
use App\Models\admin\WinnerPrice;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{

    protected $table = 'payments';
     protected $guarded = ['id'];
    protected $fillable = [
        'r_payment_id',
        'razorpay_order_id',
        'razorpay_signature',
        'ticket_id',
        'method',
        'currency',
        'email',
        'phone',
        'amount',
        'jsount',
        'staon_response'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function lottery()
    {
        return $this->belongsTo(Lottery::class, 'lottery_id');
    }
    public function winnerPrice()
    {
        return $this->hasMany(WinnerPrice::class, 'payment_id');
    }


}
