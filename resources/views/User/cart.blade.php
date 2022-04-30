@extends('User.app')
 @section('sign')
 <br><br> <br><br>
 <div class="container">
     <div class="row">
         <div class="col-8">
          <div class="container">
            @if(! $products->count())
             <div class="text-center mt-5">
             <p class="my-auto text-secondary big">The Cart is empty</p>
             </div>
              @endif

 @foreach($products as $product)
  <div class="row">
   <div class="card flex-row my-3 "> <a href="{{route('productshow',$product)}}" class="text-decoration-none text-black">
     <img class="card-img-left example-card-img-responsive cartimage" src="{{ URL::asset('/storage/'.$product->photo) }}"/>
      <div class="col-6">
        <div class="card-body">
         <h4 class="card-title h5 h4-sm">{{$product->name}}</h4>
          <p class="card-text">{{$product->description}}</p></a>
            </div>
             </div>

     <div class="col-2 text-center mt-5">
       <p class="bg-danger text-white font-weight-bold py-1 item">{{$product->price}} $</p>
      </div>

      <div class="col-2">
    <br>
      <a href="{{route('delete-from-cart',$product)}}" class="link-secondary"> <i class="fa fa-window-close" aria-hidden="true"></i></a>
      </div>

  </div>
  </div>
  @endforeach
  </div>
  </div>

  <div class="col-4 mt-5 ">
   <div class="border border-secondary">
    <h6 class="text-center pt-2">Order Summary</h6>
    <hr>
    <h6 class="px-3">Cart Total <span class="float-right px-1">{{$total_price}} $</span></h6><hr>
    <h6 class="px-3">Shipping <span class="float-right px-1">3.8$</span></h6><hr>
    <h6 class="px-3">Total Price <span class="float-right px-1">{{$total_price+3.8}}$</span></h6><hr>
    <div class="text-center">
    <button type="submit" class="btn btn-danger mx-4 mb-2" <?php  echo (! $products->count() ? 'disabled' : '' );?>><a href="{{route('order')}}" class="text-decoration-none text-white">Submit Order</a></button></div>
   </div>
   <div class="border border-secondary">
   <h6 class="px-3">My Points : <span class="float-right px-1">{{$points}} points</span></h6>
 
   </div>
   </div>
 </div>

  </div>
  </div>