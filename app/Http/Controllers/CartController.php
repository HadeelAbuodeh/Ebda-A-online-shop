<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use App\Models\Category;
use App\Models\CartItems;
use App\Models\Customer;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add($id){
        if(!session()->has('user_id'))
        return back()->with('status','You have to sign in to add the product into your Cart');

    else 
    $user =session()->get('user_id');
    $cart=Cart::where('user_id',$user)->first();
    $item=CartItems::create([
        'cart_id' =>$cart->id,
         'product_id'=> $id
    ]);
    return back()->with('success','Added to your Cart');
    }

    public function showCart(){
    $user =session()->get('user_id');
    $cart=Cart::where('user_id',$user)->first();
    $all=Category::get();
    $products=$cart->products;
    //dd($e);
    $total=0;
    foreach ($products as $product){
        $total=$total+$product->price;
       
    } 
    $customer=Customer::where('user_id',$user)->first();
    $points=$customer->points;
    
   
    return view('User.cart',['products'=>$products ,'categories'=>$all ,'total_price'=>$total,'points'=>$points])->with('bodyClass', 'home');

    }

    public function order(){
        $all=Category::get();
        return view('User.order',['categories'=>$all ])->with('bodyClass', 'home');

    }

    public function delete($product){
        CartItems::where('product_id',$product)->delete();
        return back();
    }
}
