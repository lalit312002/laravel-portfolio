<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>


    <title>Expanding Cards</title>
</head>

<body>

    <nav class="navbar navbar-dark bg-dark">
        {{-- {{dd($cards)}} --}}
        <div class="container-fluid">
            <a class="navbar-brand" href="https://randall.qodeinteractive.com/">
                <img src={{$logo->logo}} alt=""
                    width="30" height="24">
            </a>

            <div class="d-flex justify-content-end">
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

        {{-- <div class=" panel">

            <h1 class="my-4 text-center">commercial </h1>
            <div class="d-flex align-items-center justify-content-center">
                <img src="https://randall.qodeinteractive.com/wp-content/uploads/2023/04/horizontal-gallery-img1.jpg"
                    class="rounded" width="60%" height="100%" alt="...">
            </div>

            <div class="text-center">
                <h2 class="mt-5">3D Cel Motion</h2>

                <h3>3D Cel Motion <br />Capture
                    &amp; Stop Motion </h3>

                <p class="">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia cupiditate amet quaerat veniam
                    eius, veritatis fugiat doloribus corporis ex dicta nobis non tempora? Assumenda, voluptatum. Facilis
                    saepe laboriosam ad consectetur.
                </p>
            </div>

        </div>

        <div class=" panel" style="background-color: rgb(239, 147, 121);">

            <h1 class="my-4 text-center">Modeling </h1>
            <div class="d-flex align-items-center justify-content-center">

                <img src="https://randall.qodeinteractive.com/wp-content/uploads/2023/04/horizontal-gallery-img3.jpg"
                    class="rounded" width="60%" height="70%" alt="...">
            </div>

            <div class="text-center">
                <!-- <h5 style="writing-mode: vertical-tb; text-align:center  ; ">hello</h5> -->
                <h2 class="mt-5">3D Modeling</h2>
                <h3>3D Modeling </h3>

                <p class="text-center">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia cupiditate amet quaerat veniam
                    eius, veritatis fugiat doloribus corporis ex dicta nobis non tempora? Assumenda, voluptatum. Facilis
                    saepe laboriosam ad consectetur.
                </p>
            </div>

        </div>

        <div class=" panel">

            <h1 class="my-4 text-center">Commercial</h1>
            <div class="d-flex align-items-center justify-content-center">

                <img src="https://randall.qodeinteractive.com/wp-content/uploads/2023/04/horizontal-gallery-img2.jpg"
                    class="rounded" width="60%" height="70%" alt="...">
            </div>

            <div class="text-center">
                <h2 class="mt-5">Capture
                    &amp; Stop Motion</h2>

                <h3>3D Cel Motion <br />Capture
                    &amp; Stop Motion </h3>

                <p class="text-center">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia cupiditate amet quaerat veniam
                    eius, veritatis fugiat doloribus corporis ex dicta nobis non tempora? Assumenda, voluptatum. Facilis
                    saepe laboriosam ad consectetur.
                </p>
            </div>

        </div>


        <div class=" panel" style="background-color: rgb(239, 147, 121);">

            <h1 class="my-4 text-center">Animation </h1>
            <div class="d-flex align-items-center justify-content-center">

                <img src="https://randall.qodeinteractive.com/wp-content/uploads/2023/04/horizontal-gallery-img4.jpg"
                    class="rounded" width="60%" height="70%" alt="...">
            </div>

            <div class="text-center">
                <h2 class="mt-5">Animation &amp; Motion </h2>

                <h3>Animation &amp; Motion </h3>

                <p class="text-center">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia cupiditate amet quaerat veniam
                    eius, veritatis fugiat doloribus corporis ex dicta nobis non tempora? Assumenda, voluptatum. Facilis
                    saepe laboriosam ad consectetur.
                </p>
            </div>

        </div> --}}

    </div>


    <script src="javascript.js"></script>


</body>

</html>