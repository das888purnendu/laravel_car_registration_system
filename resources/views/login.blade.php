@extends('master')
@section('title','Login')

@section('nav')
@parent
@endsection

@section('main')
<h3 class="text-center text-muted">Login</h3>
<form class="container bg-light" style="width: 30rem;" method="POST"
action={{route("login_auth")}}>

@csrf

    <div class="form-group">
      <label for="exampleInputEmail">Email address</label>
      <input type="email" required minlength="4" maxlength="50" name="email" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter email">
      @error('email')
         <small id="emailHelp" class="form-text text-danger">{{$message}}</small>
      @enderror


      @if(session('failed'))
        <small id="emailHelp" class="form-text text-danger">Invalid Email or Password !</small>
      @endif


    </div>



    <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
      <input type="password" required minlength="4" maxlength="20" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">

      @error('password')
            <small id="emailHelp" class="form-text text-danger">{{$message}}</small>
      @enderror

    </div>


    <div class="form-check">
      <input  type="checkbox" class="form-check-input" id="exampleCheck2" >
      <label class="form-check-label" for="exampleCheck2">Remember me</label>
    </div
    <br/>
    <br/>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

<br/>
@endsection

@section('footer')
@parent
@endsection
