<!DOCTYPE html>
    <html lang="en">
        <head>
        <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>Marlous</title>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>

            <link rel="stylesheet" href="{{ asset('bootstrap\bootstrap.min.css.map') }}">
            <link rel="stylesheet" href="{{ asset('bootstrap\bootstrap.min.css') }}">
            <link rel="stylesheet" href="{{ asset('css\styles.css') }}">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        </head>
       
        <body class="">
       
        
            
         <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark sticky-top">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">Marlous Shop</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="{{route ('logout')}}">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark fixed-left" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="{{route('dash')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Layouts
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{route('category')}}">Category</a>
                                    <a class="nav-link" href="{{route('product')}}">Products</a>
                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">Order</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Orders
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{route('done')}}">Done Orders</a>
                                    <a class="nav-link" href="{{route('not-done')}}">Not Done Orders</a>
                                </nav>
                            </div>
                    
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                @yield('content')
                </main>
               
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
         

         @if (!session()->has('user_id'))
            <nav class="fixed-top navbar navbar-expand-lg navbar-light bg-dark">
            <div class="logo-image">
            <img src="/photos/marlous.jpg" class="img-fluid">
            </div>
                <ul class="navbar-nav mr-auto flex-row">
                
                    <li class="nav-item">
                        <a href="" class="px-3 text-white" > Home</a>
                    </li>
                    <li  class="nav-item">
                        <a href="" class="px-3 text-white">About</a>
                    </li>
                    <li  class="nav-item">
                        <a href="" class="px-3 text-white">Contact</a>
                    </li>
                </ul>
                <ul class="navbar-nav   justify-content-end">
                @if (!session()->has('user_id'))   
                    <li  class="nav-item">
                        <a href="" class="px-3 text-white">Sign in</a>
                    </li>
                @endif
                @if (session()->has('user_id'))
                     <li  class="nav-item">
                        <a href="" class="px-3 text-white">Sign out</a>
                    </li>
                @endif
                </ul >
                
                
      
            </nav>

            @yield('log')
    @endif