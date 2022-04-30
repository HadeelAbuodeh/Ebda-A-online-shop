@extends('Admain.main')
    @section('content')
    
    <div class="main ">
    @foreach($orders as $order)
    <div class="card mx-4" style="width: auto">
     <div class="card-body">
        <h4 class="card-title text-center">Order #{{$order->id}}</h4><hr>
        <h5 class="card-subtitle mb-2 text-muted">User Info :</h5>
        <p class="card-text"><b class="big">Name :</b> {{$order->first_name}} {{$order->last_name}}</p>
        <p class="card-text"><b class="big">Phone Number  :</b> {{$order->phone}}</p>
        <p class="card-text"><b class="big">Full Address : </b>{{$order->city}}-->{{$order->area}}-->{{$order->address}} </p>
        <h5 class="card-subtitle mb-2 text-muted">Products Info :</h5>
         <div class="row">
          @foreach($order->products as $product )
          <div class="col-sm-3">
           <div class="card flex-wrap my-2" >
            <div class="card-body">
              <h6 class="card-title">Product number: <b class="big">{{$product->id}}</b></h6><hr>
              <p class="card-text">Product Name: <b class="big">{{$product->name}}</b> </p><hr>
              <p class="card-text">Product Price: <b class="big">{{$product->price}} $</b> </p><hr>
            </div>
          </div>
            </div> 

     @endforeach
 
          </div>
        </div>
      <div class="text-center">
      </div>
          @endforeach
          </div>
          </div>
          @endsection
