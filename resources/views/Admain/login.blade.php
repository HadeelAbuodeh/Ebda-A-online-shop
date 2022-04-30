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

<br><br>

<div class="container">
<div class=" center fade-in-image" >

  <h1 class="title" >SIGN IN </h1>
  <br>
<div class="sign" >

    <form  method="post" action="{{ route('login') }}">
    @csrf
  <label for="email" class="labels"  >Email:</label>
  <input type="text" class="inputs" id="email" name="email" value="{{ old('email') }}"  placeholder="enter your email " size="80"  ><br>
  @error('email')
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
    <div class="fs-3 text-danger">
  {{session('status')}};    
  </div>
      @endif
      <br>
      <br>
      <div class="text-center">
      <input type="submit" class="btn px-5 btn-primary btn-lg"  value="Sign in" >
      
    </div>
      

    
    </form> 
      </div>
    </div>

    
    </div>

</body>
</html>


