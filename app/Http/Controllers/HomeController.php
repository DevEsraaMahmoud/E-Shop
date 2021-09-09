<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $brands= Brand::all();
        $sliders = Slider::all();
        return view('home', compact('brands', 'sliders'));
    }

    public function slider(){
        $sliders = Slider::all();
        return view('admin.slider.index', compact('sliders'));
    }

    public function addSlider(Request $request){

            $request->validate([
                'title' => 'required|unique:sliders|max:255',
                'description' => 'required',
                'image' => 'required',

            ]);
            $image = $request->file('image');

            $name_gen = hexdec(uniqid());
            $img_name = $name_gen/*$img_ext*/;
            $up_location= 'images/slider/';
            $last_img= $up_location.$img_name;
            $image->move($up_location,$img_name);

            /* $name_gen = hexdec(uniqid());
             Image::make($slider_image)->resize(300,200)->save('images/slider/'.$name_gen);
             $last_img = 'images/slider/'.$name_gen;*/

            Slider::insert([
                'title'=> request('title'),
                'description'=> request('description'),
                'image'=> $last_img,
                'created_at'=> Carbon::now()
            ]);
            return redirect()->back()->with('success', 'Slider Inserted Successfully!');
        }

    public function edit(Slider $slider){

        return view('admin.slider.edit',compact('slider'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|unique:sliders|max:255',
            'description' => 'required',
        ]);
        $old_image = $request->old_image;
        $image = $request->file('image');

        $name_gen = hexdec(uniqid());
        $img_name = $name_gen;
        $up_location= 'images/slider/';
        $last_img= $up_location.$img_name;
        $image->move($up_location,$img_name);

        /*$name_gen = hexdec(uniqid());
        Image::make($slider_image)->resize(300,200)->save('images/slider/'.$name_gen);
        $last_img = 'images/slider/'.$name_gen;*/

        unlink($old_image);
        Slider::find($id)->update([
            'title'=> request('title'),
            'description'=> request('description'),
            'image'=> $last_img,
            'created_at'=> Carbon::now()
        ]);
        return redirect()->route('home.slider')->with('success', 'slider Updated Successfully!');
    }

    public function delete(Slider $slider){
        $image = $slider->image;
        unlink($image);

        $slider->delete();
        return redirect()->route('home.slider')->with('success', 'Slider Deleted Successfully! ');

    }
    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }

        public function contact(){
            return view('pages.contact');
        }




}
