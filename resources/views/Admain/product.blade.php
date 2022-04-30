@extends('Admain.main')
    @section('content')
    
    
    <div class="main">

    @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
     @endif
     @if(session()->has('updatemessage'))
    <div class="alert alert-success">
        {{ session()->get('updatemessage') }}
    </div>
 @endif
    <h2 class="sticky-top">Products</h2>
    <div class="float-right">
    <form  action="{{route ('showaddproduct')}}" method="post">
        @csrf
        
    <button type="submit" class="btn mb-2 mr-4 px-5 p-2 btn-success "><i class="fa fa-plus"></i> Add</button>
    </form></div>
    
        <table class="table"><tr>
      <th scope="col">Name</th>
      <th scope="col">Description</th>
      <th scope="col">Price</th>
      <th scope="col">Photo</th>
      <th scope="col">Delete</th>
      <th scope="col">Edit</th>
      
    </tr>
    @foreach($products as $product)
    <tr>
    <td><p>{{$product->name}}</p></td>
    <td><p>{{$product->description}}</p></td>
    <td><p>{{$product->price}}</p></td>
    <td><img src="{{ URL::asset('/storage/'.$product->photo) }}" alt="Any alt text" class="productimage"/></td>

    <td><form  action="{{route ('delete' , $product ) }}" method="post">
         @csrf
        @method('delete')
    <button type="submit" onclick="return confirm('Are you sure that you want to delete the product?')" class="btn mx-15 btn-primary btn-danger"><i class="fa fa-trash"></i> Delete</button>
    </form>
    </td>
    <td>
        <form  action=" {{route('updateshow',$product)}}" method="post">
        @csrf
    <button type="submit" class="btn mx-15 btn-warning "><i class="fa fa-edit"></i> Edit</button>
    </form>
</td>

</tr>

    @endforeach
</table>

    </div>
  
 @endsection