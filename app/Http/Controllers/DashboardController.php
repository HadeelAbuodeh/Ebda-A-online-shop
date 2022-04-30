<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class DashboardController extends Controller
{
 public function index(){
     $products=Product::get();
     $category=Category::get();
     $categorynumber=$category->count();
     $productsnumber=$products->count();
     return view('Admain.dashboard',['products'=>$productsnumber,'categories' =>$categorynumber]);
 }
}
