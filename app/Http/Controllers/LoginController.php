<?php

namespace App\Http\Controllers;

use App\Models\Admain;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use phpDocumentor\Reflection\Types\Void_;

class LoginController extends Controller
{
    public function index(){
      return view('Admain.login');
    }

    public function login(Request $request){
        $this->validate($request,[
            'email' => 'required|email|max:200',
            'password' => 'required'
        ]);

        $email=$request->input('email');
        $password=$request->input('password');
        $data=Admain::where('email',$email)->first();
        if($data){
            $hashedpass=$data->password;
            $result=Hash::check($password,$hashedpass);
            if($result){
            session()->put('admain_id',$data->admain_id);
            return redirect()->route('dash');
            }
            else 
            return back()->with('status','Invalid Login');
     
                  }
        else
          return back()->with('status','Invalid Login');

    }

    public function logout(Request $req){
        $req->session()->flush();
        return redirect()->route('login');
    }
}
