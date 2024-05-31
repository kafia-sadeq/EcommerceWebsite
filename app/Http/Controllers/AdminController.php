<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class AdminController extends Controller
{
    public function view_category()
    {
        $data=Category::all();
        return view('admin.category',compact('data'));
    }
    public function Add_category(Request $request)
    {
       $category=new Category;
       $category->category_name=$request->category;
       $category->save();
       toastr()->CloseButton()->timeout(5000)->success('Category Added Successfully.');
       return redirect()->back();
    }
    public function delete_category($id){
       $data=Category::find($id);
       $data->delete();
       toastr()->timeout(10000)->CloseButton()->success('Category Delete Successfully.');
       return redirect()->back();
    }
    public function edite_category($id){
        $data=Category::find($id);
        return view('admin.editcategory',compact('data'));
    }
    public function update_category(Request $request,$id){
        $data=Category::find($id);
        $data->category_name=$request->category;
        $data->save();
        toastr()->timeout(10000)->CloseButton()->success('Category Update Successfully.');
        return redirect('/view_category');
    }
}
