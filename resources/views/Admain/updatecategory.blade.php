  @extends('Admain.main')
      @section('content')
      
      @if(  $data->count() )
      <div class="main">
      <h2 class="sticky-top">Edit Category: </h2>
      <br>
      <div class="float-left">
      <form  action="{{route ('updatecategory',$data)}} " method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
          <label for="name">Category Name:</label>
          <input type="text" class="form-control w-100 " name="name" aria-describedby="emailHelp" value="{{$data-> name}}" >
           </div>
      @error('name')
      <div class="fs-3 text-danger">
        {{ $message }}
      </div>
      @enderror

      <div class="form-group row">
      <div class="  ">
      <label for="file">Category Photo : </label>
      <input type="file" class="form-control" name="file" value="{{$data->photo}}">
      @error('file')
      <div class="fs-3 text-danger">
        {{ $message }}
      </div>
      @enderror
      <br>
      <img src="{{ URL::asset('/storage/'.$data->photo) }}" alt="Any alt text" class="productimage"/>
    </div>
    </div>
      <button type="submit" class="btn mb-2 mr-2 p-2 btn-success "><i class="fa fa-save"></i>  Update</button>
      </form></div>
  </div>
  @endif
  @endsection
