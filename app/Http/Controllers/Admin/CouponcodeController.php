<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Couponcode;
use Illuminate\Http\Request;

class CouponcodeController extends Controller
{

    public function index(){
       $coupons =  Couponcode::all();
        return view('admin.addcouponcode',compact('coupons'));
    }

    public function store(Request $request){

        $coupon = $request->validate([
            'couponcode'=>"required",
            'discount'=>"required"
        ]);

        Couponcode::create($coupon);
        return back()->with('success',"Coupon Code is Add succesfully");

    }
   public function delete($id){
     $coupon = Couponcode::findOrFail($id);
     $coupon->delete();
       return back()->with('success',"Coupon Code is Delete succesfully");
   }
    public function getcode(Request $requset){



        // return response()->json($requset->all());
        $requset->validate([
            'couponcode' =>'required',
        ]);

         $coupon = Couponcode::where('couponcode',$requset->couponcode)->first();
         if($coupon){
            $discount  = $coupon->discount;
            return response()->json(['discount'=>$discount]);
         }
         else{
            return response()->json(['error'=>"Invaild Coupon Code "]);
         }



    }
}
