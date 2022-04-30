<?php
namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItems;
use App\Models\Cart;
use App\Models\CartItems ;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;


class OrderController extends Controller
{
    //admain
   public function done(){
       $orders=Order::where('done',1)->get();
       return view('Admain.done',['orders'=>$orders]);

   }
   public function notDone(){
    $orders=Order::where('done',0)->get();
    return view('Admain.notdone',['orders'=>$orders]);
   }

   public function makeDone($id){
    $update=Order::where('id',$id)->update(['done'=>1]);
      return back();
   }

   //user
   public function payment(Request $request){
    $this->validate($request,[
     'cardnumber' =>'required |numeric',
     'ex'=>'required',
     'number' =>'required | numeric',
     'name' =>'required| regex:/^[\pL\s\-]+$/u'
    ]);
    $user =session()->get('user_id');
        $orders=Order::where('user_id',$user)->get();
        $category=Category::get();
        return view('User.history',['orders'=>$orders ,'categories'=>$category])->with('bodyClass', 'home');

   }
}
