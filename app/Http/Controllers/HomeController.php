<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;

class HomeController extends Controller
{
   public function index(){
     return view('admin.index');
    }
   public function home(){
    $products=Product::all();
      if (Auth::id()) {
         $user=Auth::user();
         $userid=$user->id;
         $count=Cart::where('user_id', $userid)->count();
       } 
       else 
       {
          $count='';
       }
       return view('home.index',compact('products','count'));
   }
   public function product_details($id){
      $data=Product::find($id);
   if (Auth::id()) {
        $user=Auth::user();
        $userid=$user->id;
        $count=Cart::where('user_id', $userid)->count();
      } 
      else 
      {
         $count='';
      }
      return view('home.product_details',compact('data','count'));

   }
   public function add_product_to_cart($id){
      $product_id=$id;
      $user=Auth::User();
      $user_id=$user->id;
      $data=new Cart;
      $data->product_id =$product_id;
      $data->user_id=$user_id;
      $data->save();
      toastr()->timeout(10000)->CloseButton()->success('Product Added To Cart  Successfully.');
      return redirect()->back();




   }
}
