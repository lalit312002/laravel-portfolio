<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <link rel="shortcut icon" href={{$logo['favicon']->src}} />



    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>


    <title>Expanding Cards</title>
</head>

<body>

    <nav class="navbar navbar-dark bg-dark ">
        {{-- {{dd($cards)}} --}}
        <div class="container-fluid">
            <a class="navbar-brand" href="https://randall.qodeinteractive.com/">
                <img src={{url($logo['logo']->src)}} alt=""
                    width="30" height="24">
            </a>
            {{-- {{dd($logo);}} --}}

            <div class="d-flex justify-content-end">
                @if (Route::has('login'))
                <div class=" d-flex nav-item">
                    {{-- navbar-nav me-auto mb-2 mb-lg-0   ,  nav-item--}}
                    @auth
                        {{-- <a href="{{ url('/home') }}" class="nav-link text-light me-2 ">Home</a> --}}
                        {{-- <a href="{{ route('logout') }}" class=" nav-link  text-light mx-2">Log out</a> --}}

                        <a class="nav-link  text-light mx-2" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                        {{-- {{ 'Logout' }} --}}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>

                        <a href="{{ url('/dashboard') }}" class="nav-link text-light me-2 ">dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class=" nav-link  text-light mx-2">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class=" nav-link  text-light me-2">Register</a>
                        @endif
                    @endauth
                </div>
                @endif

                <button class="navbar-toggler  me-2" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarToggleExternalContent">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </div>
        <div class="collapse  position-relative z-2  ms-1" style="left: 5em; " id="navbarToggleExternalContent">
            <div class=" rounded-4 p-4">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Page</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Shop</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contactUs">Contact Us</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    

    <div class="container">
        {{-- {{dd($cards)}} --}}

        @foreach ($cards as $card)

        <div class=" panel">

            <h1 class="my-4 text-center">{{$card->title}} </h1>
            <div class="d-flex align-items-center justify-content-center">
                <img src={{$card->img}}
                    class="rounded" width="60%" height="100%" alt="...">
            </div>

            <div class="text-center">
                <h2 class="mt-5">{{$card->subtitle}} </h2>

                <h3>{{$card->subtitle}}  </h3>

                <p class="">
                    {{$card->description}} 
                </p>
            </div>

        </div>
            
        @endforeach

      

    </div>


    <script src="javascript.js"></script>


</body>

</html>