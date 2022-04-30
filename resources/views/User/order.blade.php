@extends('User.app')
 @section('sign')
 <br><br><br><br><br>
 <div class="container">
     <div class="row">
         <div class="col-10 mx-auto">
 <div class="border border-secondary  ">
 <div class="container px-4 py-4">
 <h3 class="text-center">Order Info</h3>
<hr>
<form method="post" action="{{route('order')}}">
@csrf
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="first">First Name : <span class="text-danger ">*</span></label>
      <input type="text" class="form-control" name="first" placeholder="First Name">
      @error('first')
   <div class="fs-5 back text-danger">{{ $message }}
   </div>
    @enderror
    </div>
    <div class="form-group col-md-6">
      <label for="last">Last Name : <span class="text-danger ">*</span></label>
      <input type="text" class="form-control" name="last" placeholder="Last Name">
      @error('last')
   <div class="fs-5 back text-danger">{{ $message }}
   </div>
    @enderror
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-10">
      <label for="phone">Phone Number : <span class="text-danger ">*</span></label>
      <input type="tel" class="form-control" name="phone" placeholder="Phone Number">
      @error('phone')
   <div class="fs-5 back text-danger">{{ $message }}
   </div>
    @enderror
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Address <span class="text-danger ">*</span></label>
    <input type="text" class="form-control" name="address" placeholder="1234 Main St">
    @error('address')
   <div class="fs-5 back text-danger">{{ $message }}
   </div>
    @enderror  
</div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="City">City : <span class="text-danger ">*</span></label>
      <input type="text" class="form-control" name="city">
      @error('city')
   <div class="fs-5 back text-danger">{{ $message }}
   </div>
    @enderror
    </div>
    
    <div class="form-group col-md-6">
      <label for="area">Area : <span class="text-danger ">*</span></label>
      <input type="text" class="form-control" name="area" placeholder="name of city or village">
      @error('area')
   <div class="fs-5 back text-danger">{{ $message }}
   </div>
    @enderror
    </div>
  </div>
  <div class="text-center">
  <button type="submit" class="btn btn-danger btn-lg mx-4">Submit Order</button>
  </div>
</form>
</div>
</div>
</div>
</div>
</div>
