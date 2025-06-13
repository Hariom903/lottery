<?php

namespace App\Http\Controllers;

use App\Models\admin\Lottery;
use App\Models\User;
use App\Models\Winerprice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    //
       public function index(Request $request){
        //          $lotteries = Lottery::paginate(6); // e.g., 6 per page
        // // $lotteries = Lottery::all();

       Log::channel('database')->info(' User Login page  ', ['ip'=> $request->ip()]);


       $lotteries = Lottery::where('status','open')->paginate(6);

    if ($request->ajax()) {
        return view('ticket', compact('lotteries'))->render();
    }

    $winnerLottery = Lottery::with('prizes.user')->where('status','closed')->get();
    $winneruser = [];

  foreach ($winnerLottery as $lottery) {
    foreach ($lottery->prizes as $prize) {
        if ($prize->user) {
            $winneruser[] = $prize->user;  // collect all users
        }
    }
}



    // $winneruser = User::whereIn('id', $winnerLottery->pluck('winner_id'))->get(); // fetch all winner users in one query


    return view('index', compact('lotteries','winneruser'));
}
}

