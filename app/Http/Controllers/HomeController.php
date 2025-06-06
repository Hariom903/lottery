<?php

namespace App\Http\Controllers;

use App\Models\admin\Lottery;
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

    return view('index', compact('lotteries'));
}
}
