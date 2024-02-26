<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="WoodLess">
    <meta name="author" content="Ighomena Odebala, Lewis Neiland, Zaakir Mohammad, Ismaeel Noor, Ndumiso Mbangeleli, Abdulhamid Mustapha, Umer Mohammed, Matteo Crozat">
    <meta name="keywords" content="team project, birmingham, aston university">

    <title>@yield('title')</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">

    <!-- bootstrap 5.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Font Awesome JS -->
    <script src="https://kit.fontawesome.com/c5cd4f3e40.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/wavyanimation-footer.css') }}">

    @yield('style')

</head>

<body class="antialiased">
    <div class="">
        <nav class="navbar navbar-expand-lg sticky-top">
            <div class="container-fluid">
                <a class="navbar-brand" style="margin-left:4px" href="#"><img class="logo" src="{{ asset('images\logo.png') }}" alt="Woodless Logo" /></a>


                <li id="iconsnavbar" class="d-flex ms-2">


                    <a type="button" data-bs-toggle="offcanvas" data-bs-target="#basket-offcanvas" aria-controls="basket-offcanvas" role="button" class="nav-link position-relative">
                        <button class="ms-1 btn btn-outline-light rounded-pill position-relative z-index-1" type="submit" data-mdb-ripple-init>
                            <!-- Basket Icon -->
                            <i class="fa-solid fa-shopping-basket"></i>
                        </button>
                        <!-- Red Small Icon (only shown if user has items in the basket) -->
                        <?php if (Auth()->check() && Auth()->user()->basket()->first()->productAmount() > 0) : ?>
                            <small class="badge position-absolute translate-middle badge-notification bg-danger rounded-pill">
                                {{ Auth()->user()->basket()->first()->productAmount() }}
                            </small>
                        <?php endif; ?>
                    </a>

                    @guest
                    <a type="button" href="{{ url('login') }}" class="ms-2 btn btn-outline-light rounded-pill" type="submit" data-mdb-ripple-init>
                        <i class="fa-solid fa-unlock"></i>
                    </a>
                    @else
                    <a type="button" href="{{ url('user-panel') }}" class="ms-2 btn btn-outline-light rounded-pill" type="submit" data-mdb-ripple-init>
                        <i class="fa-solid fa-user"></i>
                    </a>
                    @endguest

                    <button id="navbartoggler" class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </li>

                <div class="collapse navbar-collapse" id="navbarToggler">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" aria-current="page" href="{{ url('/') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('categories') ? 'active' : '' }}" href="{{ url('/categories') }}">Categories</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('products') ? 'active' : '' }}" href="{{ url('/products') }}">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('contact') ? 'active' : '' }}" href="{{ url('/contact') }}">Contact us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('about') ? 'active' : '' }}" href="{{ url('/about') }}">About us</a>
                        </li>
                    </ul>

                    <form method="GET" action=" {{ route('products.filter') }}" class="d-flex justify-content-center" role="search">
                        <input type="search" name="search" placeholder="Search Products..." class="rounded-pill form-control" />
                        <button class="ms-2 btn btn-outline-light rounded-pill" type="submit" data-mdb-ripple-init>
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </form>


                </div>



            </div>
        </nav>

        <div class="col" id="basket-offcanvas-div" tabindex="-1">
            <div class="shadow-lg offcanvas offcanvas-end scrollable" id="basket-offcanvas" aria-labelledby="basket-offcanvas">
                <div class="offcanvas-header text-light" style="background-color: #1d1912">
                    <h5 class="offcanvas-title" id="basket-offcanvas">Your Basket</h5>
                    <button type="button" class="btn text-light" data-bs-dismiss="offcanvas" aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
                </div>
                <div class="offcanvas-body">
                    @guest
                    <div class="">
                        <a class="link-dark" href="{{ url('basket') }}">Sign in</a> to view your basket.
                    </div>
                    @endguest
                    @auth
                    @php
                    $user = Auth()->user();
                    $basketItems = $user->basket()->first()->products()->get();
                    $totalBasketCost = $user->basket()->first()->products()->sum('cost');
                    @endphp
                    @foreach($basketItems as $item)
                    <a href="/product/{{ $item->id }}" style="text-decoration: none;">
                        <div class="card shadow-sm mb-3">
                            <div class="row g-0">
                                <div class="col-3">
                                    <img src="{{asset($item->getImages()[0])}}" class="p-2 img-fluid rounded-start" alt="...">
                                </div>

                                <div class="vr shadow-none bg-secondary"></div>

                                <div class="col-6">
                                    <div class="card-body ms-0 ps-2 pt-2">
                                        <h6 class="fw-bold mb-0 card-title">{{$item->title}}</h6>
                                        <p class="card-text">£{{$item->cost}}</p>
                                    </div>
                                </div>
                                <div class="">
                                    <small class="text-end position-absolute bottom-0 end-0 p-1 pe-2">Qty: {{$item->pivot->amount}}</small>
                                </div>
                            </div>
                        </div>
                    </a>
                    @endforeach

                    <div class="row bg-white sticky-bottom align-items-center mt-0">
                        <div class="col-100 pt-2 mb-0">
                            <h5>Total: £{{$basketItems->sum('cost')}}</h5>
                        </div>
                        <div class="col">
                            <a style="background-color: #1d1912" class="w-100 btn text-light" role="button" href="{{asset('basket')}}">Go to Basket<span style="background-color: #655d52" class="ms-2 badge rounded-pill badge-notification">{{$user->basket()->first()->productAmount()}}</span></a>
                        </div>

                        @if(!$basketItems->isEmpty())
                        <div class="col">
                            <a style="background-color: #1d1912" class="w-100 btn btn-dark" role="button" href="{{asset('checkout')}}">Checkout</a>
                        </div>
                        @endif
                    </div>
                    @endauth
                </div>
            </div>
        </div>
        <!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sticky sticky-bottom  end-0" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
 Create a Support Ticket
</button>
        <!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Create a support ticket</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        
      </div>
    </div>
  </div>
</div>
        <main>
            <!-- @include('layouts.alert') !-->
            @yield('content')
            

        </main>

        <footer class="text-center">
            <div class="svgHolder">
                <svg viewBox="0 5 120 5" class="svg-behind-footer">
                    <defs>
                        <path id="wave" d="M 0,5 C 30,5 30,7 60,7 90,7 90,5 120,5 150,5 150,7 180,7 210,7 210,5 240,5 v 28 h -248 z" />
                    </defs>

                    <!-- Adjusted position of wave3 -->
                    <use id="wave3" class="wave" xlink:href="#wave" x="0" y="1"></use>

                    <!-- Adjusted position of wave2 -->
                    <use id="wave2" class="wave" xlink:href="#wave" x="0" y="2"></use>

                    <g class="gooeff">
                        <!-- Adjusted position of wave1 -->
                        <use id="wave1" class="wave" xlink:href="#wave" x="0" y="3" />
                    </g>
                </svg>
            </div>

            <!-- Grid container -->
            <div class="container pt-4">
                <!-- Three columns -->
                <div class="row my-3">
                    <!-- About column -->
                    <div class="col-md-4">
                        <div class="border border-secondary px-2 pt-3 rounded mb-4">
                            <h5><strong>WoodLess</strong></h5>
                            <p>Stylish furniture crafted from ocean plastic, where sustainability meets sophistication in every piece of furniture.</p>
                        </div>
                    </div>
                    <!-- Site Map column -->
                    <div class="col-md-4">
                        <h5><strong>Site Links</strong></h5>
                        <ul class="list-unstyled">
                            <li><a href="{{ url('categories') }}" class="nav-link p-0">Categories</a></li>
                            <li><a href="{{ url('products') }}" class="nav-link p-0">Products</a></li>
                            <li><a href="{{ url('contact') }}" class="nav-link p-0">Contact Us</a></li>
                            <li><a href="{{ url('about') }}" class="nav-link p-0">About Us</a></li>
                        </ul>
                    </div>
                    <!-- Second Site Map column -->
                    <div class="col-md-4">
                        <h5><strong>Account</strong></h5>
                        <ul class="list-unstyled">
                            <li><a href="{{ url('register') }}" class="nav-link p-0">Register</a></li>
                            <li><a href="{{ url('login') }}" class="nav-link p-0">Login</a></li>
                            <li><a href="{{ url('basket') }}" class="nav-link p-0">Basket</a></li>
                            <li><a href="{{ url('/') }}" class="nav-link p-0">T&Cs</a></li>
                        </ul>
                    </div>
                </div>
                <!-- Three columns -->
                <hr>
                <!-- Section: Social media -->
                <section class="mb-4">
                    <!-- Social media buttons -->
                    <a class="btn btn-link btn-floating btn-lg m-1" href="https://www.facebook.com" role="button"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-link btn-floating btn-lg m-1" href="https://www.twitter.com" role="button"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-link btn-floating btn-lg m-1" href="https://www.whatsapp.com" role="button"><i class="fab fa-whatsapp"></i></a>
                    <a class="btn btn-link btn-floating btn-lg m-1" href="https://www.instagram.com" role="button"><i class="fab fa-instagram"></i></a>
                    <a class="btn btn-link btn-floating btn-lg m-1" href="https://www.linkedin.com" role="button"><i class="fab fa-linkedin"></i></a>
                    <a class="btn btn-link btn-floating btn-lg m-1" href="https://www.github.com" role="button"><i class="fab fa-github"></i></a>
                </section>
                <!-- Section: Social media -->
            </div>
            <!-- Grid container -->

            <!-- Copyright text -->
            <div class="text-center text-white p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                © 2024 Copyright:
                <a class="text-white" href="{{ url('/') }}">WoodLess</a>
            </div>
            <!-- Copyright text -->
        </footer>


        @if (session('success'))
        <div id="successAlert" class="alert alert-success position-fixed bottom-0 end-0 mb-3 me-3" role="alert" style="display: none;">

            {{ session('success') }}
            <button type="button" class="btn-close" aria-label="Close"></button>
        </div>
        @endif

        @if(session('status'))
        <div id="successAlert" class="alert alert-{{session('status') ?? 'info'}} fade show position-fixed bottom-0 end-0 mb-3 me-3 py-2" role="alert">
            @switch(session('status'))
            @case('success')
            <i class="fa-solid fa-xs fa-check"></i>
            @break

            @case('warning')
            <i class="fa-solid fa-xs fa-warning"></i>
            @break

            @case('danger')
            <i class="fa-solid fa-xs fa-xmark"></i>
            @break

            @case('info')
            <i class="fa-solid fa-xs fa-circle-info"></i>
            @break

            @default
            <i class="fa-solid fa-xs fa-circle-info"></i>
            @break
            @endswitch
            {{session('message')}}
            <!--<button type="button" class="btn-close btn-sm py-0" data-bs-dismiss="alert" aria-label="Close"></button>!-->
        </div>
        @endif
        <!-- bootstrap 5.3 -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="{{ asset('js/main.js') }}"></script>


        @yield('js')
    </div>

</body>

</html>