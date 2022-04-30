@extends('Admain.main')
 @section('content')
 <div class="main">
 <h2 class="sticky-top">Add Categories: </h2>
   <br>
    <form action="{{route('addCategory')}} " method="post" enctype="multipart/form-data">
        @csrf

      <div class="form-group row">
       <div class="col-lg-6">
       <label for="name">Category Name:</label>
       <input type="text" class="form-control  " name="name" aria-describedby="emailHelp" placeholder="Enter the name">
    @error('name')
      <div class="fs-3 text-danger">
          {{ $message }}
      </div>
    @enderror    
       </div>
       </div>
   
  

    <div class="form-group row">
    <div class="col-lg-6">
    <label for="file">Category Photo : </label>
    <input type="file" class="form-control" name="file" >
    @error('file')
    <div class="fs-3 text-danger">{{ $message }}
    </div>
    @enderror
    </div>
    </div>
    <button type="submit" class="btn btn-primary">Add</button>
    </form>
    </div>

 @endsection