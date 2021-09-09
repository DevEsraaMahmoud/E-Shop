<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $brands = Brand::all();
        return view('admin.brand.index', compact('brands'));
    }
    public function store(Request $request){

        $request->validate([
            'brand_name' => 'required|unique:brands|max:255',
            'brand_image' => 'required',

        ]);
        $brand_image = $request->file('brand_image');

        $name_gen = hexdec(uniqid());
        $img_name = $name_gen/*$img_ext*/;
     $up_location= 'images/brand/';
        $last_img= $up_location.$img_name;
        $brand_image->move($up_location,$img_name);

       /* $name_gen = hexdec(uniqid());
        Image::make($brand_image)->resize(300,200)->save('images/brand/'.$name_gen);
        $last_img = 'images/brand/'.$name_gen;*/

        Brand::insert([
            'brand_name'=> request('brand_name'),
            'brand_image'=> $last_img,
            'created_at'=> Carbon::now()
        ]);
        return redirect()->back()->with('success', 'Brand Inserted Successfully!');
    }
    public function edit(Brand $brand){

        return view('admin.brand.edit',compact('brand'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'brand_name' => 'required|unique:brands|max:255',

        ]);
        $old_image = $request->old_image;
        $brand_image = $request->file('brand_image');

        $name_gen = hexdec(uniqid());
        $img_name = $name_gen;
        $up_location= 'images/brand/';
        $last_img= $up_location.$img_name;
        $brand_image->move($up_location,$img_name);

        /*$name_gen = hexdec(uniqid());
        Image::make($brand_image)->resize(300,200)->save('images/brand/'.$name_gen);
        $last_img = 'images/brand/'.$name_gen;*/

        unlink($old_image);
        Brand::find($id)->update([
            'brand_name'=> request('brand_name'),
            'brand_image'=> $last_img,
            'created_at'=> Carbon::now()
        ]);
        return redirect()->route('all.brand')->with('success', 'Brand Updated Successfully!');
    }

    public function delete(Brand $brand){
        $image = $brand->brand_image;
        unlink($image);
        
        $brand->delete();
        return redirect()->route('all.brand')->with('success', 'brand Deleted Successfully! ');

    }
    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }

}
