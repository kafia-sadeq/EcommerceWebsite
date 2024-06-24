<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Order;
use App\Models\User;

class HomeController extends Controller
{
   public function index(){
     $user=User::where('usertype','user')->get()->count();
     $order=Order::all()->count();
     $product=Product::all()->count();
     $delivered=Order::where('status','Delivered')->get()->count();
     return view('admin.index',compact('user','order','product','delivered'));
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
   public function mycart()
   {   
      if (Auth::id()) {
      $user=Auth::user();
      $userid=$user->id;
      $count=Cart::where('user_id', $userid)->count();
      $cart=Cart::where('user_id', $userid)->get();
    } 
    else 
    {
       $count='';
    }
      return view('home.mycart',compact('count','cart'));
   }
   public function delete_cart($id){
      /* $data=Cart::find($id);
      $data->delete();
       toastr()->timeout(10000)->CloseButton()->success('Category Delete Successfully.');
       return redirect()->back(); */
       return $id;
   }
   public function confirm_order(Request $request){
      $name=$request->name;
      $phone=$request->phone;
      $address=$request->address;
      $userid=Auth::user()->id;
      $cart=Cart::where('user_id', $userid)->get();
      foreach($cart as $carts){
         $order=new Order;
         $order->name=$name;
         $order->rec_address=$address;
         $order->phone=$phone;
         $order->user_id=$userid;
         $order->product_id=$carts->product_id;
         $order->save();
      }
      $cart_remove=Cart::where('user_id', $userid)->get();
      foreach($cart_remove as $remove){
         $data=Cart::find($remove->id);
         $data->delete();
      }
      toastr()->timeout(10000)->CloseButton()->success('Product Order Successfully.');
       return redirect()->back();
      return redirect()->back();
   }
   
}
