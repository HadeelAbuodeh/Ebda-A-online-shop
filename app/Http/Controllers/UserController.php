<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItems;
use App\Models\Cart;
use App\Models\CartItems;
use App\Models\Customer;
use Illuminate\Support\Facades\View;
class UserController extends Controller
{
    public function product($id){
        $category=Category::get();
     $data=Product::where('id',$id)->first();
     return View::make('User.showproduct')->with('bodyClass', 'home')->with('product',$data)->with('categories',$category);

    }

    public function search(Request $request){
        $category=Category::get();
        $data=Product::Where('name', 'like', '%' . $request->search . '%')->get();
        return view('User.search',['products'=>$data ,'categories'=>$category])->with('bodyClass', 'home');
    }

    public function order(Request $request){
        $this->validate($request,[
            'first' =>'required | alpha',
            'last'=>'required | alpha',
            'address' =>'required| regex:/^[a-zA-Z0-9\s]+$/',
            'phone'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10 ',
            'city' => 'required| regex:/^[\pL\s\-]+$/u',
            'area' => 'required| regex:/^[\pL\s\-]+$/u'
        ]);
        $user =session()->get('user_id');
        $item=Order::create([
            'user_id' =>$user,
             'first_name'=> $request->first,
             'last_name'=>$request->last,
             'phone'=>$request->phone,
             'city'=>$request->city,
             'area'=>$request->area,
             'address'=>$request->address,
             'done'=>0,
             'date_of_order'=>date('Y-m-d ')
        ]);
        $order=Order::where('user_id',$user)->latest('id')->first();
        $cart=Cart::where('user_id',$user)->first();
       // dd($cart->id);
        $items=CartItems::where('cart_id',$cart->id)->get();
         //dd($items);
         foreach($items as $product)
        $order_items=OrderItems::create([
          'order_id'=>$order->id ,
          'product_id'=>$product->product_id
        ]);


        $products=$cart->products;
        $total=0;
       foreach ($products as $product){
        $total=$total+$product->price;
        } 
   
     $customer=Customer::where('user_id',$user)->first();
      if($total>=50){
      $points=$customer->points+1;
      $update=Customer::where('user_id',$user)->update(['points'=> $points]);
        }
        CartItems::where('cart_id',$cart->id)->delete();
        $category=Category::get();
        
        return view('User.payment',['categories'=>$category])->with('bodyClass', 'home');

    }

    public function history(){
        $user =session()->get('user_id');
        $orders=Order::where('user_id',$user)->get();
        $category=Category::get();
        return view('User.history',['orders'=>$orders ,'categories'=>$category])->with('bodyClass', 'home');

        
    }
    
}
