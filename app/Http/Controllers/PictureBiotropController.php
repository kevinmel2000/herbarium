<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Model\Picture;

class PictureBiotropController extends Controller
{

    public function createpic()
    {
        return view('picture');
    }

    public function picture(Request $request)
    {
        // dd($request);
        $file = $request->file('image');
        $fileName = $file->getClientOriginalName();
        $request->file('image')->move("biotrop/",$fileName);

        $picture   = Picture::where('id_picture', 1)->first();
        $picture   -> pic_biot                               = $fileName;
        $picture   -> save();
        
        if($request->image2 != null){
            $file = $request->file('image2');
            $fileName = $file->getClientOriginalName();
            $request->file('image2')->move("biotrop/",$fileName);

            $picture   = Picture::where('id_picture', 2)->first();
            $picture   -> pic_biot                               = $fileName;
            $picture   -> save();
        }
        
        if($request->image3 != null){
            $file = $request->file('image3');
            $fileName = $file->getClientOriginalName();
            $request->file('image3')->move("biotrop/",$fileName);

            $picture   = Picture::where('id_picture', 3)->first();
            $picture   -> pic_biot                               = $fileName;
            $picture   -> save();
        }
        return redirect()->intended('/biotrop-management');
 
    } 

}