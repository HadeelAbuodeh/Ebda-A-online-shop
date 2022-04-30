<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(){
        $category=Category::get();
        return view('Admain.category',['categories'=>$category]);
    }

    public function add(Request $request){
        $this-> validate($request,[
            'name' => 'required|regex:/^[\pL\s\-]+$/u',
            'file'=>'  required ',
        ]);
        $path=$request->file('file')->store('/','public');

        $data = Category::create([
            'name' => $request -> name,
           'photo' =>  $request->file->hashName()

        ]);
        return redirect()->route('category')->with('message', 'Added Successfuly!');

    }

    public function update($category){ //the parameter here is the id
        $data=Category::where('id',$category)->first();
        return view('Admain.updatecategory',['data'=>$data]);
    }

    public function updateCategory(Request $request ,$data){
        $info= Category::where('id',$data)->first();
        if($info->name==$request->name){
        $this-> validate($request,[
        'name' => 'required| regex:/^[\pL\s\-]+$/u' ]);}
        else {
            $this-> validate($request,[
                'name' => 'required|regex:/^[\pL\s\-]+$/u|unique:category']);
        }
        if(!$request->file){
            $update=Category::where('id',$data)->update(['name'=> $request->name]);
  }
        else{
            
            $path=$request->file('file')->store('/','public');
            $update=Category::where('id',$data)->update(['name'=> $request->name,'photo'=>$request->file->hashName()]);
      
        }
       return redirect()->route('category')->with('updatemessage', 'Updated Successfully');;        
    
    }

    public function destroy( $categroy ){
        $delete=Category::find($categroy);
         $delete->delete();
         return back();
     }
}
