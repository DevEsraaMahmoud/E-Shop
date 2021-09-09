<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $categories = Category::all();
        return view('admin.products.index', compact('products', 'categories'));

    }
    public function create()
    {
        $products = Product::all();
        $categories = Category::all();
        return view('admin.products.create', compact('products', 'categories'));

    }
    public function store(Request $request){

        $request->validate([
            'product_name' => 'required|unique:products|max:255',
            'product_image' => 'required',
            'product_price' =>'required',
            'quantity' =>'required',

        ]);
        $product_image = $request->file('product_image');

        $name_gen = hexdec(uniqid());
        $img_name = $name_gen/*$img_ext*/;
        $up_location= 'images/product/';
        $last_img= $up_location.$img_name;
        $product_image->move($up_location,$img_name);

        /* $name_gen = hexdec(uniqid());
         Image::make($brand_image)->resize(300,200)->save('images/brand/'.$name_gen);
         $last_img = 'images/brand/'.$name_gen;*/

        Product::insert([
            'product_name'=> request('product_name'),
            'product_price'=> request('product_price'),
            'quantity'=> request('quantity'),
            'category_id'=> $request->input('category'),
            'product_image'=> $last_img,
            'created_at'=> Carbon::now()
        ]);

        return redirect()->route('all.products')->with('success', 'Product Inserted Successfully!');
    }

    public function edit(Product $product){
        $categories = Category::all();

        return view('admin.products.edit',compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'product_name' => 'unique:products|max:255',

        ]);
        $old_image = $request->old_image;
        $product_image = $request->file('product_image');

        $name_gen = hexdec(uniqid());
        $img_name = $name_gen;
        $up_location= 'images/product/';
        $last_img= $up_location.$img_name;
        $product_image->move($up_location,$img_name);

        /*$name_gen = hexdec(uniqid());
        Image::make($brand_image)->resize(300,200)->save('images/brand/'.$name_gen);
        $last_img = 'images/brand/'.$name_gen;*/
        if($old_image){
            unlink($old_image);
        }
        Product::find($id)->update([
            'product_name'=> request('product_name'),
            'product_price'=> request('product_price'),
            'quantity'=> request('quantity'),
            'category_id'=> $request->input('category'),
            'product_image'=> $last_img,
            'created_at'=> Carbon::now()
        ]);
        return redirect()->route('all.products')->with('success', 'Product Updated Successfully!');
    }
    public function delete(Product $product){
        $image = $product->product_image;
        unlink($image);

        $product->delete();
        return redirect()->route('all.products')->with('success', 'Product Deleted Successfully! ');

    }
    public function products(){
        $products = Product::all();
        $sliders = Slider::all();
        return view('pages.products' , compact('products', 'sliders'));
    }
}
