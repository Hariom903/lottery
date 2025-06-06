<?php

namespace App\Console\Commands;
use Carbon\Carbon;
use App\Models\admin\Lottery;
use App\Models\Ticket;
use App\Models\User;
use App\Notifications\Winner;
use Illuminate\Console\Command;

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
        //Generate a random winner
      $startOfDay = Carbon::today();
$endOfDay = Carbon::today()->endOfDay();
$lotters = Lottery::whereBetween('draw_datetime', [$startOfDay, $endOfDay])->get();

        if ($lotters->count() > 0) {
              foreach ($lotters as $lottery) {
                $lottery_id= $lottery->id;
                  if ($lottery->status === 'closed') {
                    continue; // Skip if already closed
                  }

                $ticket = Ticket::where('lottery_id', $lottery_id)->inRandomOrder()->first();
                if ($ticket) {
                    $ticket->is_winning = true;
                    $ticket->save();
                    $lottey_number= $ticket->ticket_number;
                     $user_id = $ticket->user_id;
                 $lotters = Lottery::find($lottery_id);
                 $lotters->winner_id = $user_id;
                 $lotters->status = 'closed';
                 $lotters->save();

                 $user = User::find($user_id);
                 if($user){
                      $user->notify(new Winner($lottey_number));

                 }


                }


                }






            }
        }
}


