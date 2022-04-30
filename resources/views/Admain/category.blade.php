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
        <div calss="float-left">
        <h2 class="sticky-top">Categories</h2>
        </div>

        <div class="float-right">
        <form  action="{{route ('showadd')}} " method="post">
        @csrf
        <button type="submit" class="btn mb-2 mr-4 px-5 p-2 btn-success "> <i class="fa fa-plus"></i>  Add</button>
        </form>
        </div>
        <table class="table">
        <tr>
         <th scope="col">Name</th>
         <th scope='col'>Photo</th>
         <th scope="col">Deletion</th>
         <th scope="col">Edit</th>
        </tr>
 @foreach($categories as $category)
<tr>
    <td><p>{{$category->name}}</p></td>
    <td><img src="{{ URL::asset('/storage/'.$category->photo) }}" alt="Any alt text" class="productimage"/></td>
    <td><form  action="{{route ('destroy' , $category ) }} " method="post">
         @csrf
         @method('delete')
    <button type="submit" onclick="return confirm('Are you sure that you want to Delete The Category?')" class="btn mx-15 btn-primary btn-danger"><i class="fa fa-trash"></i> Delete</button>
        </form>
    </td>
    <td>
    <form  action=" {{route ('showupdate'  , $category ) }}" method="post">
     @csrf
    <button type="submit" class="btn btn-warning "><i class="fa fa-edit"></i>Edit</button>
    </form>
    </td>
</tr>

 @endforeach
</table>
 

</div>
@endsection