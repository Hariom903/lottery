<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Lottery;
use App\Models\admin\WinnerPrice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
class AdminController extends Controller
{

    public function dashboard(){
        return view('admin.dashboard');
    }
    public function login(){
        return view('admin.login');
    }
    public function loginPost(Request $request){
         $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password'], 'role' => 'admin'])) {
            $request->session()->regenerate();

            return redirect("admin/dashboard");
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');

    }
    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }

    public function lottery(Request $request){
         $search = $request->input('search');
          $query = Lottery::query();
      if ($search) {
        $query->where(function ($q) use ($search) {
        $q->where('title', 'LIKE', '%' . $search . '%')
          ->orWhere('description', 'LIKE', '%' . $search . '%')
          ->orWhere('ticket_price', 'LIKE', '%' . $search . '%');
      });
    }

    $lotteries = $query->latest()->paginate(8);

    // Keep search query in pagination links
    $lotteries->appends(['search' => $search]);

    return view('admin.lotteries', compact('lotteries'));
    }
    public function lotteryStore(Request $request){

        $validatedData = $request->validate([
            'title' => ['required','string','max:255'],
            'description' => ['required','string'],
            'ticket_price' => ['required', 'numeric'],
            'total_tickets'=> ['required', 'numeric'],
            'number_of_winners' => ['required', 'numeric','min:1'],

        ]);

        // Validate and sanitize input data
         $data = ['draw_datetime'=> Carbon::now()->addDays(6)]; // or use $data->created_at->addDays(6);
         $data = array_merge($data, $validatedData);
        // Store data in database

        Lottery::create($data);
        // Redirect to lottery page
        return back()->with('success', 'Lottery created successfully.');

    }


    public function show($id){

        $lottery = Lottery::where('tid',$id)->first();
        if($lottery){
            return view('admin.showlotteyinfo', compact('lottery'));
        }

        return redirect()->route('lottery');
    }
    public function pricestore(Request $request){

   $val= $request->validate([
    'lottery_id' => 'required|exists:lotteries,id',
    'winning_price' => 'required|array',
    'winning_price.*' => 'required|string|max:255',
    'prize_name' => 'required|array',
    'prize_name.*' => 'required|string|max:255',
]);


    foreach ($request->winning_price as $position => $price) {

       $pric =  WinnerPrice::create([
        'lottery_id' => $request->lottery_id,
        'winner_position' => $position,
        'prize_name' => $request->prize_name[$position] ?? 'Prize ' . $position,
        'prize_amount' => $price ?? 0,
    ]);



    return redirect()->back()->with('success', 'Winning prizes added successfully!');
    }
}
}

