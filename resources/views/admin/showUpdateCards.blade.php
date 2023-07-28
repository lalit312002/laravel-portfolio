<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href={{url("style.css")}}>

    <link rel="shortcut icon" href={{url('assets/img/favicon.png')}} />


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>


    <title>Expanding Cards</title>
</head>

<body>

    <nav class="navbar navbar-dark bg-dark ">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">
                <img src={{url('assets/img/logo.png')}} alt=""width="30" height="24">
            </a>

        </div>
    </nav>

    <div class="text-center">
        <a href='/admin/createCard' class="btn btn-primary text-center mt-3 ">Create card</a>
        <a href='/admin/updateLogo' class="btn btn-primary text-center mt-3 ms-5 ">Update logo</a>
    </div>

    <div class="container">
    

        @foreach ($cards as $card)

        <div class=" panel">
            <div class="d-flex align-items-center justify-content-center">
                <a href='/admin/showUpdateData/{{$card->id}}' class="btn btn-primary mt-3 ">Edit</a>
                {{-- <a href='/admin/deleteCardData/{{$card->id}}' onclick=" return confirm('are you sure')" class="btn btn-danger mt-3 mx-3 ">delete</a> --}}
              
                <form id="delete-form-{{$card->id}}" method="POST" action="/admin/deleteCardData/{{$card->id}}">
                    @csrf
                    @method('DELETE')
                    <a  href='/admin/deleteCardData/{{$card->id}}' class="btn btn-danger mt-3 mx-3" onclick=" deleteIt(event,{{$card->id}});"><i class=""></i> Delete</a>
                </form>
                
            </div>

            <h1 class="my-4 text-center">{{$card->title}} </h1>
            <div class="d-flex align-items-center justify-content-center">
                <img src={{asset($card->img)}}
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


    <script src={{url("javascript.js")}}></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
         function deleteIt(e,id){
            e.preventDefault();
            let urlToRidirect=e.currentTarget.getAttribute('href');
            urlToRidirect=`/admin/deleteCardData/${id}`;
            console.log(`${id}ii`,urlToRidirect,document.querySelector('input[name="_token"]').value);

            swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this file!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                swal("Poof! Your  file has been deleted!", {
                    icon: "success",
                });
                // window.location.href='/admin/showUpdateCards';
                // response=fetch(`urlToRidirect`,{
                // method: 'DELETE',
                // headers: { 
                //     'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                //     'Content-Type': 'application/json' },
                
                // }).then((response) => response.json())  ;
                document.getElementById(`delete-form-${id}`).submit();
                

            } else {
                swal("Your file is safe!");
            }
        });
         }
    </script>



</body>

</html>