<?php

namespace App\Http\Controllers;

use App\Models\admin\Lottery;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
   public function mytickets()
{
    $tickets = Ticket::with('lottery')
        ->where('user_id', Auth::id())
        ->get();

  
 // Make sure to inspect deeply

    return view('myticket', compact('tickets'));
}
}
