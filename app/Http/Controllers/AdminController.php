<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class AdminController extends Controller
{
    public function view_category()
    {
        return view('admin.category');
    }
    public function Add_category(Request $request)
    {
       $category=new Category;
       $category->category_name=$request->category;
       $category->save();
       toastr()->CloseButton()->timeout(5000)->success('Category Added Successfully.');
       return redirect()->back();
    }
}
