@extends('Admain.main')
    @section('content')
    
    @if($categories->count()&& session()->has('admain_id') &&$data->count())
    <div class="main ">
<form action="{{route('updateproduct',$data)}} " method="post" enctype="multipart/form-data" >
    @csrf
  <div class="form-group row">
  
  <div class="col-lg-6">
    <label for="name">Product name :</label>
    <input type="text" class="form-control" name="name" placeholder="" value="{{$data->name}}">
    @error('name')
    <div class="fs-3 text-danger">{{ $message }}
    </div>
    @enderror
  </div>
  

  </div> 
  
  <div class="form-group row">
  <div class="col-lg-6">
    <label for="description">Product Description :</label>
    <textarea class="form-control" name="description" rows="3" >{{$data->description}}</textarea>
    @error('description')
    <div class="fs-3 text-danger">{{ $message }}
    </div>
    @enderror
  </div>
  </div>

  <div class="form-group row">
  <div class="col-lg-6">
    <label for="price">Product Price :</label>
    <input type="text" class="form-control" name="price" value="{{$data->price}}" placeholder="Enter a number"></input>
    @error('price')
    <div class="fs-3 text-danger">{{ $message }}
    </div>
    @enderror
  </div>
  </div>


  <div class="form-group row">
  <div class="col-lg-6">
    <label for="file">File : </label>
    <input type="file" class="form-control" name="file" value="{{$data->photo}}" >
    @error('file')
    <div class="fs-3 text-danger">{{ $message }}
    </div>
    @enderror
  </div>
  </div>

  <label> Product Category :</label>
@foreach($categories as $category)
  <div class="form-check">
  <input class="form-check-input" type="checkbox" value="{{$category->id}}" name="check_list[]" <?php foreach($checked as $check) echo ($category->id==$check->category_id ? 'checked' : '');?> >
  <label class="form-check-label" for="check_list[]">{{$category->name}}</label>
  @error('check_list')
    <div class="fs-3 text-danger">{{ $message }}
    </div>
    @enderror
</div>
@endforeach

<br> 
   <label  >Availability :</label><br>
  <div class="form-check">
  <input type="checkbox" class="form-check-input" name="check" <?php  echo ($data->available==1 ? 'checked' : '' );?> >
  <label class="form-check-label">Available </label>
       
</div>
    <button type="submit" class="btn btn-success float-right mb-2 mr-4 px-5 p-2"><i class="fa fa-save"></i>  Save</button>
</form>
</div>
@endif
@endsection