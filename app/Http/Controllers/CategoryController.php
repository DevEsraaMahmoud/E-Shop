<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function AllCat(){
        $categories = Category::latest()->paginate(5);
        return view('admin.category.index', compact('categories'));
    }
    public function AddCat(Request $request){
        $request->validate([
            'Category_name' => 'unique:categories|max:255',
        ],
            [
                'Category_name.required' => 'Please Enter Category Name',

            ]

        );
        Category::insert([
           'category_name'=> request('Category_name'),
            'user_id'=>Auth::user()->id,
            'created_at'=> Carbon::now()
        ]);
        return redirect()->back()->with('success', 'Category Inserted Successfully!');
    }

    public function EditCat(Category $category){

        return view('admin.category.edit',compact('category'));
    }

    public function UpdateCat(Request $request, $id){
        $request->validate([
            'Category_name' => 'unique:categories|max:255',
        ],
            [
                'Category_name.required' => 'Please Enter Category Name',

            ]

        );
        Category::find($id)->update([
            'category_name'=> request('Category_name'),
            'user_id'=>Auth::user()->id
        ]);
        return redirect()->route('all.category')->with('success', 'Category Updated Successfully!');
    }

    public function Delete(Category $category){
        $category->delete();
        return redirect()->route('all.category')->with('success', 'Category Deleted Successfully! ');

    }


}
