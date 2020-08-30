@extends('master')
@section('title','Home')

@section('nav')
@parent
@endsection

@section('main')

    <div class="section text-center">
        <img src="assets/img/car1.png" class="img-fluid" alt="Responsive image">
        <br/>
        <br/>
        <p class="h3 text-muted">Register Your Car Today</p>
    </div>
    <hr/>


    <div class="jumbotron text-center">
        <h1 class="display-4">Welcome!</h1>

        <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
        <p class="lead">
          <a class="btn btn-primary btn-lg" href="registration" role="button">Register</a>
        </p>
      </div>





    <div class="row text-center">
    <div class="card" style="width: 16rem;">
        <img class="card-img-top" src="assets/img/car2.jpeg" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">Card title</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
      </div>

      <div class="card" style="width: 16rem;">
        <img class="card-img-top" src="assets/img/car3.jpg" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">Card title</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
      </div>

      <div class="card" style="width: 16rem;">
        <img class="card-img-top" src="assets/img/car4.jpg" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">Card title</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
      </div>

      <div class="card" style="width: 16rem;">
        <img class="card-img-top" src="assets/img/banner_car.jpg" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">Card title</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
      </div>


    </div>


<br/>

@endsection

@section('footer')
@parent
@endsection
