<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Lottery;
use App\Models\admin\WinnerPrice;
use App\Notifications\Winner;
use Illuminate\Http\Request;

use function Pest\Laravel\json;

class PriceaddController extends Controller
{
    //
    public function index()
    {
        $lotteries = Lottery::all();
        foreach($lotteries as $lottery){
            $number_of_winners = $lottery->number_of_winners;

             $lottery_id = $lottery->id;
             $prizes = WinnerPrice::where('lottery_id', $lottery_id)->count();
             if($prizes== $number_of_winners && $number_of_winners>0){
                 $lottery->status = 'open';
                 $lottery->save();
             }
            else{
                   $lottery->status = 'drawn';
                  $sac= $lottery->save();


        }
             }


        return view('admin.addprice',compact('lotteries'));
    }
    public function store(Request $request)
    {

         $request->validate([
            'lottery_id' => ['required'],
            'prize_name' => ['required'],
            'winner_position' => ['required'],
             'image' => ['required'],
        ]);

        $image = $request->file('image');
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('images'), $imageName);

         $WinnerPrice = new WinnerPrice();
         $WinnerPrice->lottery_id = $request->lottery_id;
         $WinnerPrice->prize_name = $request->prize_name;
         $WinnerPrice->winner_position = $request->winner_position;
         $WinnerPrice->img_name = $imageName;
         $WinnerPrice->save();
         // Notify winner
         return redirect()->route('price.add')->with('success', 'Winner Price added successfully');



    }

    public function winnernumber(Request $request){
         $lottery_id = $request->lottery_id;
        $lottery = Lottery::find($lottery_id);
         $winner_number = $lottery->number_of_winners;
       $existingPositions =$lottery->prizes->pluck('winner_position')->toArray();
       // check if all positions are filled or not
       $arr = [];
       $status = 0;
       for ($i = 1; $i <= $winner_number; $i++){
           if (!in_array($i, $existingPositions)){
               $arr[] = $i;
               $status = 1;

           }

       }

       if($status == 0 && $winner_number>0){
           $lottery =  Lottery::find($lottery_id);
        if($lottery->status!= 'closed'){
           $lottery->status = 'open';
           $lottery->save();
        }
       }

        return response()->json(['arr'=>$arr]);

    }
}
