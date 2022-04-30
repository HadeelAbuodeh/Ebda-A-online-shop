@extends('Admain.main')
    @section('content')
    
    @if($categories->count() )
    <div class="main ">
    <h2 class="sticky-top">Add Product :</h2>
      <br>
<form action="{{route('addproduct')}}" method="post" enctype="multipart/form-data" >
    @csrf
  <div class="form-group row">
  
  <div class="col-lg-6">
    <label for="name">Product name :</label>
    <input type="text" class="form-control" name="name" placeholder="">
    @error('name')
    <div class="fs-5 text-danger">{{ $message }}
    </div>
    @enderror
  </div>
  

  </div> 
  
  <div class="form-group row">
  <div class="col-lg-6">
    <label for="description">Product Description :</label>
    <textarea class="form-control" name="description" rows="3"></textarea>
    @error('description')
    <div class="fs-5 text-danger">{{ $message }}
    </div>
    @enderror
  </div>
  </div>

  <div class="form-group row">
  <div class="col-lg-6">
    <label for="price">Product Price :</label>
    <input type="text" class="form-control" name="price" placeholder="Enter a number"></input>
    @error('price')
    <div class="fs-5 text-danger">{{ $message }}
    </div>
    @enderror
  </div>
  </div>


  <div class="form-group row">
  <div class="col-lg-6">
    <label for="file">File : </label>
    <input type="file" class="form-control" name="file" >
    @error('file')
    <div class="fs-5 text-danger">{{ $message }}
    </div>
    @enderror
  </div>
  </div>
  <label> Product Category :</label>
  
  @foreach($categories as $category)
  <div class="form-check">
  <input class="form-check-input" type="checkbox" value="{{$category->id}}" name="check_list[]">
  <label class="form-check-label" for="check_list[]">{{$category->name}}</label>
  @error('check_list')
    <div class="fs-5 text-danger">{{ $message }}
    </div>
    @enderror
</div>
@endforeach

  <!-- <div class="form-group">
    <label for="exampleFormControlSelect1">Example select</label>
    <select class="form-control" id="exampleFormControlSelect1">
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect2">Example multiple select</label>
    <select multiple class="form-control" id="exampleFormControlSelect2">
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
    </select>
  </div> -->
    <button type="submit" class="btn btn-success float-right mb-2 mr-4 px-5 p-2">Add</button>
</form>
</div>
@endif
@endsection