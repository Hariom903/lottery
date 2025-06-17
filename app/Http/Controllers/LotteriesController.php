<?php

namespace App\Http\Controllers;

use App\Models\admin\Lottery;
use Illuminate\Http\Request;

class LotteriesController extends Controller
{
    //
    public function index()
    {
        // Logic to display the list of lotteries

    //    $lotteries = Lottery::paginate(8);
        $lotteries = Lottery::where('status','open')->paginate(6);
        return view('lotteries' , compact('lotteries'));
    }
}
