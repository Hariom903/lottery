<?php

namespace App\Http\Controllers;

use App\Models\admin\Lottery;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
       public function index(){
        $lotteries = Lottery::all();
        return view('index', compact('lotteries'));
    }
}
