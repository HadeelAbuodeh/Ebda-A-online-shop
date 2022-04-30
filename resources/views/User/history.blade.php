@extends('User.app')
 @section('sign')
 <br> 
 @if(! $orders->count())
   <div class="text-center mt-5">
     
     <p class="my-auto text-secondary big">There is no Orders</p>
   </div>
   @endif
 @foreach($orders as $order)
 
    <div class="card mx-5 mb-4" >
  <div class="card-body px-5">
    <h5 class="card-title text-center">Order #{{$order->id}}</h5><hr>
    
    <h6 class="card-subtitle mb-2 text-muted">Order Info :</h6>
    <p class="card-text">Date of Order : {{$order->date_of_order}}</p>
    <h6 class="card-subtitle mb-2 text-muted">Products Info :</h6>
    <div class="row">
    @foreach($order->products as $product )
    <a href="{{route('productshow',$product)}}" class="text-decoration-none text-black">

    <div class="card flex-row my-3 ">
    <img class="card-img-left example-card-img-responsive cartimage" src="{{ URL::asset('/storage/'.$product->photo) }}"/>
   <div class="col-6">
   <div class="card-body">
    <h4 class="card-title h5 h4-sm">{{$product->name}}</h4>
    <p class="card-text">{{$product->description}}</p>
   </div>
   </div>
    <div class="col-2 text-center mt-5">
<p class="bg-danger text-white font-weight-bold py-1 item">{{$product->price}} $</p>

</div>
<div class="col-2">
    <br>
</div>
  </div>
    </a>
     @endforeach
 
  </div>
</div>
  </div>
     @endforeach
    
   
     @endsection