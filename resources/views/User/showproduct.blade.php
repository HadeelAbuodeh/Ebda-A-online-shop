@extends('User.app')
 @section('sign')
 <br><br><br><br><br><br>
 <div class="container bg-container ">
  <div class="row">
    <div class="col-6 ml-5">
        <h1 >{{$product->name}}</h1><br>
        <h5 >{{$product->description}} </h5><br>
        
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star"></span>
        <span class="fa fa-star"></span>

       <div class="row text-center">
         <div class="col-6"><br><br><br><br><br>
        <p class="bg-danger text-white font-weight-bold px-5 py-1 item">{{$product->price}} $</p>
         </div>
        </div>
       <br><br> 

       <div class="row">
         <div class="col-10 text-center">
            <a href="{{route('add-to-cart',$product->id)}}" class="text-decoration-none" > <p class="bg-warning text-white font-weight-bold px-5 py-2">Add to the Cart <i class="fa fa-shopping-cart" style="font-size:20px;color:white"></i></p></a>
          </div>
          @if(session('status'))
    <div class="fs-5 text-danger">
  {{session('status')}}    
  </div>
  @endif
  @if(session('success'))
    <div class="fs-5 text-success">
  {{session('success')}}    
  </div>
  @endif
       </div>
  </div>
  
    <div class="col-4 ">
        <img src="{{ URL::asset('/storage/'.$product->photo) }}" alt="no" class="myimage" />
    </div>
</div>
 
</div>
</div>
