@extends('User.app')
 @section('sign')
 <br><br> <br><br> 

 <div class="container">
 @if(! $products->count())
   <div class="text-center mt-5">
     
     <p class="my-auto text-secondary big">There is no results</p>
   </div>
   @endif
 @foreach($products as $product)
 
 <div class="row">
<a href="{{route('productshow',$product)}}" class="text-decoration-none text-black">
 <div class="card flex-row my-3 ">
 <img class="card-img-left example-card-img-responsive cartimage" src="{{ URL::asset('/storage/'.$product->photo) }}"/>
 <div class="col-6">
 <div class="card-body">
    <h4 class="card-title h5 h4-sm">{{$product->name}}</h4>
    <p class="card-text">{{$product->description}}</p>
 </div></div>
    <div class="col-2 text-center mt-5">
<p class="bg-danger text-white font-weight-bold py-1 item">{{$product->price}} $</p>

</div>

  </div>
</a>
</div>
  @endforeach
