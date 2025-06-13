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

       $lotteries = Lottery::paginate(8);
        return view('lotteries' , compact('lotteries'));
    }
}
