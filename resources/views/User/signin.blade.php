@extends('User.app')
 @section('sign')

 <br><br><br><br><br><br>
 <div class="container">

<div class=" center fade-in-image" >

  <h1 class="title" >SIGN IN </h1>
  <br>
<div class="sign" >

    <form  method="post" action="{{route('user-login')}}">
    @csrf
   

  <label for="phone" class="labels"  >Phone Number:</label>
  <input type="text" class="inputs" id="phone" name="phone" value="{{ old('phone') }}"  placeholder="enter your phone number " size="80"  ><br>
  @error('phone')
   <div class="fs-5 back text-danger">{{ $message }}
   </div>
    @enderror
  <label for="pwd" class="labels" >Password:</label>
   <input type="password" class="inputs" id="password" name="password"  placeholder="enter your password"  > 
   @error('password')
   <div class="fs-5 back text-danger">{{ $message }}
   </div>
    @enderror
    @if(session('status'))
    <div class="fs-4 text-danger">
  {{session('status')}}    
  </div>
  @endif
  
  <br><br>
  <div class="text-center">
  <input type="submit" class="btn px-5 btn-primary btn-lg"  value="Sign in" >
 </div>
 <br>
 <p>You don't have an Account? <a href="{{route('user-signup')}}">Create new acount</a></p>


 
</form> 
  </div>
</div>

 
</div>

 </div>