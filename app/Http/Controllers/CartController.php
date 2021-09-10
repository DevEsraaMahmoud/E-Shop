<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(){
        $product = Product::all();
        return view('pages.checkout', compact('product'));
    }
    public function addProduct(Product $product){
        return view('pages.checkout', compact('product'));
    }

}
