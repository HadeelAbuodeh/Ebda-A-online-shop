<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\OrderItems;

class HomeController extends Controller
{
    public function home(){
        $categories=Category::get();        
       // $most=OrderItems::select('product_id ,count(product_id)  as counter' )->groupBy('product_id')->orderByDesc('counter')->get();
        //dd($most);
        return View::make('User.home')->with('bodyClass', 'home')->with('categories',$categories);
      }
      public function element($cat){
        dd($cat);
      }
}
