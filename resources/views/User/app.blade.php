<!DOCTYPE html>
    <html lang="en">
        <head>
        <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>EBDA'A Shop</title>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <link rel="stylesheet" href="{{ asset('bootstrap\bootstrap.min.css.map') }}">
            <link rel="stylesheet" href="{{ asset('bootstrap\bootstrap.min.css') }}">
            <link rel="stylesheet" href="{{ asset('css\styles.css') }}">
            <link rel="stylesheet" href="{{ asset('css\userlog.css') }}">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
           
            </head>
       
        <body class='{{ $bodyClass  }}'>
        <nav class="fixed-top mb-4 navbar navbar-expand-lg navbar-light bg-dark ">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  
            <div class="logo-image">
            <img src="/photos/logo3.jpg" class="img-fluid">
            </div>
            <div class="collapse navbar-collapse" id="navbarNav">

                <ul class="navbar-nav mr-auto flex-row">
                
                    <li class="nav-item">
                        <a href="{{route ('home-page')}}" class="px-3 text-decoration-none text-white" > Home</a>
                    </li>
                    <li  class="nav-item">
                        <a href="#about" class="px-3 text-decoration-none text-white">About</a>
                    </li>
                    <li  class="nav-item">
                        <a href="" class="px-3 text-decoration-none text-white">Contact</a>
                    </li>
                    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle px-3 text-decoration-none text-white pt-0" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Category
        </a>
                <div class="dropdown-menu bg-black" aria-labelledby="navbarDropdown">

        @foreach($categories as $category)
          <a class=" nav-item drop myhover text-white text-decoration-none" href="{{route('shp',$category)}}">{{$category->name}}</a>
          
        
        @endforeach</div>
      </li>
                </ul>
                <ul class="navbar-nav ">
                <li  class="nav-item">
                <form method="post" action="{{route('search')}}" class="d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                @csrf
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." name="search" aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="submit"><i class="fa fa-search"></i></button>
                </div>
            </form>
                </li>
            </ul>  
                <ul class="navbar-nav justify-content-end">
                @if (session()->has('user_id'))  
                <li  class="nav-item">
                        <a href="{{route('show-cart')}}" class="px-3 text-decoration-none text-white">
                        <i class="fa fa-shopping-cart" style="font-size:20px;color:white"></i></a>
                    </li>
                    @endif
                @if (!session()->has('user_id'))   
                    <li  class="nav-item">
                        <a href="{{route('user-login')}}" class="px-3 text-decoration-none text-white">Sign in</a>
                    </li>

                @endif
                @if (session()->has('user_id'))
                <li  class="nav-item">
                        <a href="{{route('history')}}" class="px-3 text-decoration-none text-white"><i class="fa fa-history" style="font-size:16px"></i> History</a>
                    </li>
                     <li  class="nav-item">
                        <a href="{{route('user-logout')}}" class="px-3 text-decoration-none text-white">Sign out</a>
                    </li>
                @endif
                </ul >
                  
            </div>
            </nav>
           
            <br><br><br><br>
         
      <!--      <div class="input-group mt-4">
  <div class="form-outline">
    <input type="search" id="form1" class="form-control" />
    <label class="form-label" for="form1">Search</label>
  </div>
  <button type="button" class="btn btn-primary">
    <i class="fas fa-search"></i>
  </button>
</div>
            This page took {{ microtime(true) - LARAVEL_START }} seconds to render

-->           
            @yield('sign')
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
            <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
        </body>
    </html>