<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>contactus data</title>

<style>
    html,
body,
.intro {
  height: 100%;
}

table td,
table th {
  text-overflow: ellipsis;
  white-space: nowrap;
  overflow: hidden;
}

thead th,
tbody th {
  color: #fff;
}

tbody td {
  font-weight: 500;
  color: rgba(255,255,255,.65);
}

.card {
  border-radius: .5rem;
}
</style>


<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>
<body>


<section class="intro">
    <div class="bg-image h-100" style="background-image: url('https://mdbootstrap.com/img/Photos/new-templates/tables/img2.jpg');">
      <div class="mask d-flex align-items-center h-100" style="background-color: rgba(0,0,0,.25);">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-12">
              <div class="card bg-dark shadow-2-strong">
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-dark table-borderless mb-0">
                      <thead>
                        <tr>
                          <th scope="col">NAME</th>
                          <th scope="col">MOBILE</th>
                          <th scope="col">EMAIL</th>
                          <th scope="col">MESSAGE</th>
                        </tr>
                      </thead>
                      <tbody>

                        @foreach ($data as $item)
                        <tr>
                            <th scope="row">{{$item->name}}</th>
                            <td>{{$item->mobile}}</td>
                            <td>{{$item->email}}</td>
                            <td>{{$item->message}}</td>
                          </tr>
                        @endforeach
                                              
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

      
</body>
</html>