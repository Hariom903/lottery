<?php

namespace App\Http\Controllers;

use App\Models\admin\Lottery;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
 public function updateprofile(Request $requset){

      $requset->validate([
        'name'=> "required|min:3|max:30",
        "phone"=>"nullable|numeric|min_digits:10|max_digits:13"
      ]);



     $user = Auth::user();
       if($requset->hasFile('image')){
          $image = $requset->file('image');
        $imageName = time()."-".Auth::user()->name.$image->getClientOriginalName();
        $image->move(public_path("images/user"),$imageName);
       $user->image = $imageName;
      }
      if($requset->name)
      {
        $user->name = $requset->name;
      }
      if($requset->phone){
        $user->phone = $requset->phone;
      }
      $user->update();

      return response()->json(['status' => 'success']);

 }




public function mytickets()
{
    // latest tickets for the authenticated user




    $tickets = Ticket::with('lottery')
        ->where('user_id', Auth::id())
        ->orderBy('created_at', 'desc')
        ->get();


 // Make sure to inspect deeply

    return view('myticket', compact('tickets'));
}



}
