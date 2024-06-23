<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;


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
    public function add_product(){
        $category=Category::all();
        return view('admin.AddProduct', compact('category'));
    }
    public function upload_product(Request $request){

        $data=new Product;
        $data->title =$request->title;
        $data->description =$request->description;
        $data->category =$request->category;
        $data->price =$request->price;
        $data->quantity =$request->qty;
        $path = $request->file('image')->store('public/images');
        $data->image = $path;
        $data->save();
        toastr()->timeout(10000)->CloseButton()->success('Product Added Successfully.');
        return redirect()->back();
    }

    public function view_product(){
        $product=Product::paginate(3);
        return view('admin.view_product',compact('product'));
    }
    public function delete_product($id){
      $product=Product::find($id);
      //Image Path
      $imagePath = $product->image;
      //Verify the existence of the image
      if (Storage::exists($imagePath)) {
        Storage::delete($imagePath);
       }
      $product->delete();
       toastr()->timeout(10000)->CloseButton()->success('Category Delete Successfully.');
       return redirect()->back();

    }
    public function edite_product($id){
     $products=Product::find($id);
     $category=Category::all();
     return view('admin.edite_product',compact('products','category'));
    }

    public function update_product(Request $request , $id){
        $product=Product::find($id);
         $product->title =$request->title;
         $product->description =$request->description;
         $product->category =$request->category;
         $product->price =$request->price;
         $product->quantity =$request->qty;
         $path = $request->file('image')->store('public/images');
         $product->image = $path;
         $product->save();
         toastr()->timeout(10000)->CloseButton()->success('Category Update Successfully.');
         return redirect('/view_product');
    }
    public function product_search(Request $request){
        $search = $request->input('search');
        $product = Product::where('title', 'like', "%{$search}%")->paginate(3);
        return view('admin.view_product',compact('product'));
    }
    public function view_order(){
        $order=Order::paginate(5);
        return view('admin.order',compact('order'));
    }
    public function on_the_way($id){
      $order=Order::find($id);
      $order->status='On the way';
      $order->save();
      return redirect('/view_product');

    }
    public function Delivered($id){
      $order=Order::find($id);
      $order->status='Delivered';
      $order->save();
      return redirect('/view_product');

    }
}
