<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Models\Admain;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function index(){
        return view('Admain.signup');
    }
    public function logup(Request $request){
       
        $this->validate($request,[
            'name' => 'alpha|required',
            'email' => 'email|required',
            'password' => 'required|confirmed',
        ]);

        $data = Admain::create([
            'name' => $request -> name,
            'email' => $request -> email,
           'password' =>  Hash::make($request -> password) ,

        ]);
        return redirect()->route('login');
    }
}
