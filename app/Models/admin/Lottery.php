<?php

namespace App\Models\admin;

use App\Models\Ticket;
use App\Models\admin\WinnerPrice;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str; // ✅ Add this import

class Lottery extends Model
{
    protected $fillable = [
        'title',
        'description',
        'ticket_price',
        'total_tickets',
        'number_of_winners',
        'draw_datetime',
        'tid', // ✅ Include 'tid' if you want it to be mass assignable
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($lottery) {
            if (empty($lottery->tid)) {
                $lottery->tid = (string) Str::uuid(); // Auto-generate unique TID
            }
        });
    }
     public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
    public function prizes()
{
    return $this->hasMany(WinnerPrice::class);
}
}
