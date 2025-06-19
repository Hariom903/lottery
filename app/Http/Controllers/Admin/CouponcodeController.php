<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Couponcode;
use Illuminate\Http\Request;

class CouponcodeController extends Controller
{
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
