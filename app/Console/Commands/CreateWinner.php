<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\admin\Lottery;
use App\Models\admin\WinnerPrice;
use App\Models\Ticket;
use App\Models\User;
use App\Notifications\Winner;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class CreateWinner extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-winner';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
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
                    $number_of_winners = $lottery->number_of_winners;
                    $lotters = Lottery::find($lottery_id);
                        // $lotters->winner_id = $user_id;
                        $lotters->status = 'closed';
                        $lotters->save();

                for ($i = 0; $i < $number_of_winners; $i++) {
                    //  echo($lottery_id);
                    $ticket = Ticket::where('lottery_id', $lottery_id)->inRandomOrder()->first();

                    if ($ticket) {
                     $user_id = $ticket->user_id;
                    //   echo($user_id);
                        $ticket->is_winning = true;
                        $ticket->save();

                        $lottey_number = $ticket->ticket_number;


                        $winner = WinnerPrice::where('winner_position', $i + 1)
                         ->where('lottery_id',$lottery_id)
                        ->first();

                        // echo($user_id);


                        $winner->user_id = $user_id;
                        $winner->status = 'successful';
                        $winner->save();


                        $user = User::find($user_id);
                        if ($user) {
                              $user->notify(new Winner($lottey_number));
                            // print_r("Winner has been notified");
                        }
                    }
                }
            }
        }
    }
}
