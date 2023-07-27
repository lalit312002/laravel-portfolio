
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<link rel="shortcut icon" href={{url('assets/img/favicon.png')}} />

<link rel="stylesheet" href={{url("css/contactUs.css")}}>


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
            <form method="post" action="/admin/storeCardData" enctype="multipart/form-data">
                @csrf
                <h3>Create Card</h3>
               <div class="row">
                    <div class="col-md-6">
                        
                        <div class="form-group">
                            <input type="text" name="title" class="form-control" placeholder=" card title *" value="" />
                        </div>
                        <div class="form-group">
                            <input type="text" name="subtitle" class="form-control" placeholder=" card subtitle *" value="" />
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Card image</label>
                            <input type="file"  name="cardImg" class="form-control-file" id="exampleFormControlFile1">
                        </div>
                        
                        
                        <div class="form-group">
                            <input type="submit" name="Submit" class="btnContact" value="Create" />
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <textarea name="description" class="form-control" placeholder="description *" style="width: 100%; height: 150px;"></textarea>
                        </div>
                        
                    </div>
                </div>
            </form>
</div>