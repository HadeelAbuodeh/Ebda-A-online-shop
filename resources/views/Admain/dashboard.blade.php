@extends('Admain.main')
    @section('content')
    
    <div class="main text-center ">
     <h2>Welcome admain to EBDA'A online shop control</h2>
      <br><br>
     <div class="card-group d-flex justify-content-center flex-wrap ">
     <a class="nav-link" href="{{route('product')}}">
     <div class="card text-white bg-success mb-3 mr-5" style="max-width: 18rem;">
  <div class="card-body">
    <h1 class="card-title">{{$products}} Product </h1>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div></div>
     </a>
     <a class="nav-link" href="{{route('category')}}">
  <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
  <div class="card-body">
    <h1 class="card-title">{{$categories}} Category</h1>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
</div>
     </a>
     
     </div>
    </div>
@endsection
