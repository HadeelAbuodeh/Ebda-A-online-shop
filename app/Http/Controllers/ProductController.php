<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\CategoryProduct;

class ProductController extends Controller
{
   public function index(){
       $product =Product::get();
       return view('Admain.product',['products'=>$product]);

   }

   public function category(){
    $category=Category::get();
    return view('admain.addproduct',['categories'=>$category]);
}

  public function add(Request $request){
    $this-> validate($request,[
        'name' =>'required| regex:/^[a-zA-Z0-9\s]+$/|   unique:product',
        'description' =>'required | max:200',
        'price' => 'required | numeric',
        'file'=>'  required | mimes:jpeg,png,jpg,svg,doc,docx,odt,pdf,tex,txt,wpd,tiff,tif,csv,psd,key,odp,pps,ppt,pptx,ods,xls,xlsm,xlsx ',
        'check_list'=> 'required' ,
        'available' => 'numeric'

    ]);
    $path=$request->file('file')->store('/','public');

    $data = Product::create([
        'name' => $request -> name,
        'description' => $request -> description,
       'price' => $request -> price ,
       'photo' =>  $request->file->hashName(),
       'available' => '1'

    ]);

      $name=$request->name;
      $product=Product::where('name',$name)->first();//dd($product->id);
      foreach ($request->check_list as $check){
      $product->categorys()->attach($check);}
      return redirect()->route('product')->with('message', 'Added Successfuly!');
  }

  public function delete($product){
    $data=Product::find($product);
    $data->delete();
    return back();
}

public function update ($product){
    $category=Category::get();
    $data= Product::where('id',$product)->first();
    $check=CategoryProduct::where('product_id',$product)->get() ;
    return view('Admain.updateproduct',['data'=>$data,'categories'=>$category,'checked'=>$check]);


}

public function updateProduct(Request $request ,$data){
    $info= Product::where('id',$data)->first();
    if($info->name==$request->name){
        $this-> validate($request,[
            'name' =>'required |  regex:/^[a-zA-Z0-9\s]+$/ ',
            'description' =>'required | max:200',
            'price' => 'required | numeric',
            'check_list'=> 'required' ]);
    }
    else{
    $this-> validate($request,[
        'name' =>'required |  regex:/^[a-zA-Z0-9\s]+$/ | unique:product',
        'description' =>'required | max:200',
        'price' => 'required | numeric',
        'check_list'=> 'required' ]);}
        
        if($request->has('check')){
                $update=Product::where('id',$data)->update(['available'=>1]);}
                else
                $update=Product::where('id',$data)->update(['available'=>0]);
        if(!$request->file){
            
            $update=Product::where('id',$data)->update(['name'=> $request->name ,'description'=>$request->description,'price'=>$request->price]);
            $name=$request->name;
            $data=CategoryProduct::where('product_id',$data)->delete();
            //   $data->delete();
            $product=Product::where('name',$name)->first();
            foreach ($request->check_list as $check){
                $product->categorys()->attach($check);}
        }
        else{
            
            $path=$request->file('file')->store('/','public');
       $update=Product::where('id',$data)->update(['name'=> $request->name ,'description'=>$request->description,'price'=>$request->price,'photo'=>$request->file->hashName()]);
       $name=$request->name;
       $data=CategoryProduct::where('product_id',$data)->delete();
       //   $data->delete();
       $product=Product::where('name',$name)->first();
       foreach ($request->check_list as $check){
           $product->categorys()->attach($check);}
           
    }
   return redirect()->route('product')->with('updatemessage', 'Updated Successfully');;        

}
public function showproducts($category){
    $all=Category::get();
    $c=Category::find($category);
    $e=$c->products;
    //$product =CategoryProduct::get()->where('category_id',$category);
    
    return view('User.showproducts',['products'=>$e ,'categories'=>$all])->with('bodyClass', 'home');


}



}
