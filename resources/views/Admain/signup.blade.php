<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="{{ asset('bootstrap\bootstrap.min.css.map') }}">
            <link rel="stylesheet" href="{{ asset('bootstrap\bootstrap.min.css') }}">
            <link rel="stylesheet" href="{{ asset('css\log.css') }}">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>

<br>

<div class="container">
<div class=" center fade-in-image" >

  <h1 class="title" >SIGN UP </h1>
<div class="sign" >

    <form  method="post" action="{{ route('logup') }}">
    @csrf
    <label for="name" class="labels"  >Name:</label>
  <input type="text" class="inputs" id="name" name="name" value="{{ old('name') }}"  placeholder="enter your name " size="80"  ><br>
  @error('name')
   <div class="fs-5 back text-danger">{{ $message }}
   </div>
    @enderror
  <label for="email" class="labels"  >Email:</label>
  <input type="text" class="inputs" id="email" name="email" value="{{ old('email') }}"  placeholder="enter your email " size="80"  ><br>
  @error('email')
   <div class="fs-5 back text-danger">{{ $message }}
   </div>
    @enderror
  <label for="password" class="labels" >Password:</label>
   <input type="password" class="inputs" id="password" name="password"  placeholder="enter your password"  > 
   @error('password')
   <div class="fs-5 back text-danger">{{ $message }}
   </div>
    @enderror
    <label for="password_confirmation" class="labels" >Confirm Your Password:</label>
   <input type="password" class="inputs" id="password" name="password_confirmation"  placeholder="Repeate your password"  > 
   
  <br>
  <br>
  <div class="text-center">
  <input type="submit" class="btn px-5 btn-primary btn-lg"  value="Sign Up" >
  
 </div>
  

 
</form> 
  </div>
</div>

 
</div>

</body>
</html>


