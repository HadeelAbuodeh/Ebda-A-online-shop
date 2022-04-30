<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Customer;
use App\Models\Cart;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;

use Illuminate\Http\Request;

class UserLoginController extends Controller
{
    public function index(){
      $categories=Category::get();
        return View::make('User.signin')->with('bodyClass', 'background')->with('categories',$categories);
      }
    
    public  function login(Request $request)
    {
      $this->validate($request,[
        'phone'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10 ',
        'password' => 'required'
    ]);
      $phone=$request->phone;
      $result=Customer::where('phone',$phone)->first();
      if($result){
        $hashed=$result->password;
        $check=Hash::check($request->password,$hashed);
        
        if($check){
          $categories=Category::get();
          session()->put('user_id',$result->user_id);  
          return View::make('User.home')->with('bodyClass', 'home')->with('categories',$categories);

              }
        else        
         return back()->with('status','Invalid Login');

      }
      else     
       return back()->with('status','Invalid Login');

    }


    public function signUpShow(){
      $categories=Category::get();
      return View::make('User.logup')->with('bodyClass', 'background')->with('categories',$categories);
   
    }
    public function signUp(Request $request){
      $this->validate($request,[
        'name' => 'required|regex:/^[a-zA-Z0-9\s]+$/|max:20',
        'phone'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10 |unique:customer',
        'password' => 'required'
    ]);
     $date=Customer::create([
       'name'=>$request->name,
       'phone'=>$request->phone,
       'password'=>Hash::make($request->password),
       'points'=>0
     ]);
     $user=Customer::where('name',$request->name)->first();
     $cart=Cart::create([
      'user_id' =>$user->user_id
     ]);
     $categories=Category::get();
    return  View::make('User.signin')->with('bodyClass', 'background')->with('categories',$categories);


    }
    public function logout(Request $req){
      $category=Category::get();
      $req->session()->flush();
      return View::make('User.home')->with('bodyClass', 'home')->with('categories',$category);
    }
}
