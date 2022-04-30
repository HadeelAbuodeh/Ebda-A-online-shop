@extends('User.app')
 @section('sign')
 <br><br><br><br><br>
<div class="col-7 mx-auto">
 <div class="border border-secondary mx-auto ">
 <div class="container px-4 py-4">
 <h3 class="text-center">Payment Info</h3>
<hr>
  <form method="post" action="{{route('payment')}}">
@csrf
  <div class="form-row">
    <div class="form-group col-md-10">
      <label for="card">Card Number : <span class="text-danger ">*</span></label>
      <input type="number" class="form-control" name="cardnumber" placeholder="1234 5678 9012 3456" >
    </div>
    </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="ex">Expiry date : <span class="text-danger ">*</span></label>
      <input type="month" class="form-control" name="ex" placeholder="Last Name">
    </div>
      <div class="form-group col-md-6">
      <label for="cv">CVC / CVV : <span class="text-danger ">*</span></label>
      <input type="number" class="form-control" name="number" placeholder="Phone Number">
    </div>
  </div>
  <div class="form-group">
    <label for="name">Name on Card <span class="text-danger ">*</span></label>
    <input type="text" class="form-control" name="name" placeholder="Omar Sami">
  </div>
  
 
  <button type="submit" class="btn btn-danger btn-lg mx-4 mb-2">Submit Order</button>
</form>
</div>

</div>
</div>
</div>