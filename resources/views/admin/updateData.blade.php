
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<link rel="stylesheet" href={{url("css/contactUs.css")}}>

<div class="container contact-form">
            <div class="contact-image">
                <img src="https://image.ibb.co/kUagtU/rocket_contact.png" alt="rocket_contact"/>
            </div>
            <form method="post" action="/admin/storeUpdateData" enctype="multipart/form-data">
                @csrf
                <h3>Update Data</h3>
               <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="id" class="form-control" placeholder="card id *" value="" />
                        </div>
                        <div class="form-group">
                            <input type="text" name="title" class="form-control" placeholder=" card title *" value="" />
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Card image</label>
                            <input type="file"  name="cardImg" class="form-control-file" id="exampleFormControlFile1">
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Change logo</label>
                            <input type="file" name="logo" class="form-control-file" id="exampleFormControlFile1">
                        </div>
                        
                        <div class="form-group">
                            <input type="submit" name="Submit" class="btnContact" value="Send Message" />
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <textarea name="description" class="form-control" placeholder="description *" style="width: 100%; height: 150px;"></textarea>
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Change favicon</label>
                            <input type="file" name="favicon" class="form-control-file" id="exampleFormControlFile1">
                        </div>
                    </div>
                </div>
            </form>
</div>