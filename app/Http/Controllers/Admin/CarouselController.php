<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\admin\Carousel;
use Illuminate\Http\Request;

class CarouselController extends Controller
{
    //
    public function index(){
        return view('admin.addcarousel');
    }
    public function store(Request $request)
    {
        // Validate the request required
        $validate = $request->validate([
            'carousel-1'=>'required|image|mimes:png,jpg,jpeg,gif,svg',
            'carousel-2'=>'required|image|mimes:png,jpg,jpeg,gif,svg',
            'carousel-3'=>'required|image|mimes:png,jpg,jpeg,gif,svg',
        ]);

        foreach($validate as $key => $data){
          $file = $request->file($key);

          $fileName = time() . "-". $file->getClientOriginalName();

          $file->move(public_path('carousel'),$fileName);

    $succes = Carousel::create([
               "title" => $key,
               'path'=>$fileName,
          ]);
        }
        return redirect()->back()->with('success', 'Carousel item added successfully.');
    }
}
