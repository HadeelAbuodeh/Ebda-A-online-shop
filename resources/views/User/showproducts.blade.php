@extends('User.app')
 @section('sign')
 <br><br><br> 
 
 @foreach($products->chunk(4) as $chunk)
 <div class="d-flex justify-content-center flex-wrap ">
 
 @foreach($chunk as $product)
 <div class="card mx-2 my-2">
    <img class="card-img-top" style="width: 245px; height: 250px;" src="{{ URL::asset('/storage/'.$product->photo) }}" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title max">{{$product->name}}</h5>
      <p class="card-text max">{{$product->description}}</p>
      <a class="btn btn-danger btn-sm btn-block " href="{{route('productshow',$product)}}" role="button">{{$product->price}}$</a>
    </div>
  </div>

          @endforeach
          @endforeach
 </div>