
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<link rel="shortcut icon" href={{url('assets/img/favicon.png')}} />

<link rel="stylesheet" href={{url("css/contactUs.css")}}>

<body>
    <nav class="navbar navbar-dark bg-dark ">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">
                <img src={{url('assets/img/logo.png')}} alt=""width="30" height="24">
            </a>
        </div>    
    </nav>

    <div class="container contact-form">
                <div class="contact-image">
                    <img src="https://image.ibb.co/kUagtU/rocket_contact.png" alt="rocket_contact"/>
                </div>
                <form method="post" action="/admin/storeUpdateLogo" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <h3>Update Data</h3>
                   <div class="row">
                        <div class="col-md-6">
                            
                           
                            
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Change logo</label>
                                <input type="file" name="logo" class="form-control-file" id="exampleFormControlFile1">
                            </div>
                            
                            <div class="form-group">
                                <input type="submit" name="Submit" class="btnContact" value="Update" />
                            </div>
    
                        </div>
                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="exampleFormControlFile1">Change favicon</label>
                                <input type="file" name="favicon" class="form-control-file" id="exampleFormControlFile1">
                            </div>
                        </div>
                    </div>
                </form>
    </div>
</body>
