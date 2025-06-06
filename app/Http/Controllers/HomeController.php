<?php

namespace App\Http\Controllers;

use App\Models\admin\Lottery;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
       public function index(Request $request){
        //          $lotteries = Lottery::paginate(6); // e.g., 6 per page
        // // $lotteries = Lottery::all();





       $lotteries = Lottery::paginate(6);

    if ($request->ajax()) {
        return view('ticket', compact('lotteries'))->render();
    }

    $winnerLottery = Lottery::where('status','closed')->get('winner_id');
  $winneruser = [];

for ($i = 0; $i < count($winnerLottery); $i++) {
    $winner = User::find($winnerLottery[$i]->winner_id);
    $winneruser[$i] = $winner;
}



    return view('index', compact('lotteries','winneruser'));
}
}

