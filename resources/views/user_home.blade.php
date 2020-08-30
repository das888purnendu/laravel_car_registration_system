<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>User dashboard</title>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="home">Company Name</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">

            <li class="nav-item active">
              <a class="nav-link" href="user_home">Home</a>
            </li>

            <li class="nav-item">
                <a class="btn btn-outline-primary" href="logout">Logout</a>
              </li>
          </ul>

        </div>
    </nav>
      <br/>



    <div class="container" style="min-height: 500px;">

        <h2 class="text-center text-muted">Your Car details</h2>

        @if($status=="unregistered")
            <h4 class="text-center text-danger">Your car registration request is pending</h4>
        @else
             <h4 class="text-center text-success">Your car is successfully registered</h4>
        @endif

        <div class="container bg-light" style="width: 30rem;">

            <div class="form-group">
                <label>1. Your car image</label>
                <img src="storage\uploads\car_img\{{$car_model_id}}.jpg" alt="car image" class="img-thumbnail">
            </div>


            <div class="form-group">
                <label>2. Owner full name</label>
            <input type="text" class="form-control" readonly value="{{$name}}">
            </div>

            <div class="form-group">
                <label>3. Car model name</label>
                <input type="text" class="form-control" readonly value="{{$model_name}}">
            </div>

            <div class="form-group">
                <label>4. Car Company name</label>
                <input type="text" class="form-control" readonly value="{{$company}}">
            </div>

            <div class="form-group">
                <label>5. Car color </label>
                <input type="text" class="form-control" readonly value="{{$color}}">
            </div>

            <div class="form-group">
                <label>6. Fuel type </label>
                <input type="text" class="form-control" readonly value="{{$fuel}}">
            </div>

            <div class="form-group">
                <label>7. Car chassis number </label>
                <input type="text" class="form-control" readonly value="{{$body_number}}">
            </div>

            @if($status=="registered")

                <div class="form-group">
                    <label>8. Car registration number</label>
                <input type="text" class="form-control" readonly value="{{$reg_number}}">
                </div>

                <div class="form-group">
                    <label>9. Registration Date </label>
                <input type="text" class="form-control" readonly value="{{$reg_date}}">
                </div>




            @endif
            </div>
            <br/>

    </div>







    <footer class="bg-dark text-lg-center text-secondary" style="min-height: 45px;">
        <p>Copyrighted by @ Company</p>
    </footer>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
