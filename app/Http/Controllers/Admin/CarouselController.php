<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\admin\Carousel;
use Illuminate\Http\Request;

class CarouselController extends Controller
{
    //
    public function index(){
        $carousels =  Carousel::all();
        return view('admin.addcarousel',compact('carousels'));
    }
    public function store(Request $request)
    {
        // Validate the request required
        $validate = $request->validate([
            'carousel'=>'required|image|mimes:png,jpg,jpeg,gif,svg',
            'position'=>"required|max:3|min:1|numeric",
        ]);
         $carousel = Carousel::where('position',$request->position)->first();
         if($request->hasFile('carousel')){
             $file = $request->file('carousel');

             $fileName = time() . "-". $file->getClientOriginalName();
             if($carousel){
                $oldimg = $carousel->path;
                 if($oldimg){
                 $image_path =  "carousel/$oldimg";
                 if(file_exists($image_path)){
                   unlink($image_path);
                  }
                 }

               $file->move(public_path('carousel'),$fileName);
                 $carousel->path = $fileName;
                 $carousel->position = $request->position;
                 $carousel->title= "carousel".$request->position;
                 $carousel->update();
                 return back();
             }

          $file->move(public_path('carousel'),$fileName);

           $succes = Carousel::create([
            'title' => "carousel".$request->position,
            'path'=>$fileName,
            'position'=>$request->position,
          ]);
        }
        return
        back()->with('success', 'Carousel item added successfully.');
    }

    public function Edit($id){

         $carousel = Carousel::find($id);

          if($carousel->is_active){
             $carousel->is_active = false;
          }
          else{
            $carousel->is_active = true;
          }

          $carousel->update();

          return back();


    }
    public function  delete($id){

        $carousel = Carousel::findorFail($id);
        $path = $carousel->path;
        if($path){
             $image_path =  "carousel/$path";
           if(file_exists($image_path)){
           unlink($image_path);
        }
        }
        $carousel->delete();
        return back();

    }
}
