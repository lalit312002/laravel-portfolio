
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<link rel="shortcut icon" href={{url('assets/img/favicon.png')}} />

<link rel="stylesheet" href={{url("css/contactUs.css")}}>

<body>
    <nav class="navbar navbar-dark bg-dark ">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">
                <img src={{asset('assets/img/logo.png')}} alt=""width="30" height="24">
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
    <div class="container contact-form">
                <div class="contact-image">
                    <img src="https://image.ibb.co/kUagtU/rocket_contact.png" alt="rocket_contact"/>
                </div>
                <form method="post" action="/admin/storeUpdateData" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <h3>Update Data</h3>
                   <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="id" class="form-control" placeholder="card id *" value={{$card->id}} />
                            </div>
                            <div class="form-group">
                                <input type="text" name="title" class="form-control" placeholder=" card title *" value={{$card->title}} />
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Card image</label>
                                <input type="file"  name="cardImg" class="form-control-file" id="exampleFormControlFile1">
                            </div>
                            
                            
                            <div class="form-group">
                                <input type="submit" name="Submit" class="btnContact" value="Update" />
                            </div>
    
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <textarea name="description" class="form-control" placeholder="description *" style="width: 100%; height: 150px;">{{$card->description}}</textarea>
                            </div>
                            
                        </div>
                    </div>
                </form>
    </div>
</body>
