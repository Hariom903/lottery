<?php

namespace App\Http\Controllers;

use App\Models\admin\Lottery;
use App\Models\Ticket;
use App\Models\User;
use App\Notifications\Winner;
use Carbon\Carbon;
use Illuminate\Http\Request;

class handle extends Controller
{

    public function handlePayment()
    {
        $startOfDay = Carbon::today();
        $endOfDay = Carbon::today()->endOfDay();
        $lotters = Lottery::whereBetween('draw_datetime', [$startOfDay, $endOfDay])->get();

        if ($lotters->count() > 0) {
            foreach ($lotters as $lottery) {

                if ($lottery->status === 'closed') {
                    continue; // Skip if already closed
                  }
                $lottery_id = $lottery->id;

                  $ticket = Ticket::where('lottery_id', $lottery_id)->inRandomOrder()->first();
                if ($ticket) {


                    $ticket->is_winning = true;
                    $ticket->save();
                  $lottey_id = $ticket->lottery_id;
                  $user_id = $ticket->user_id;
                 $lotters = Lottery::find($lottery_id);
                 $lotters->winner_id = $user_id;
                 $lotters->status = 'closed';
                 $lotters->save();

                 $user = User::find($user_id);
                 if($user){
                    //   $user->notify(new Winner());
                      print_r("Winner has been notified");
                 }


                }




            }
        }
    }
}
