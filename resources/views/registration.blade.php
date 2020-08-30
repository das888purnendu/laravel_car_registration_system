@extends('master')
@section('title','Registration')

@section('nav')
@parent
@endsection

@section('main')
<h3 class="text-center text-muted">Registration Form</h3>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif


<form action={{route("registration_form")}} class="container bg-light" style="width: 30rem;" method="post">

    @csrf

    <div class="form-group">
        <label for="exampleInputName">Full Name</label>
        <input type="text" required minlength="4" maxlength="50" name="name" class="form-control" id="exampleInputName"  placeholder="Enter your name">

      </div>

      <div class="form-group">
        <label for="exampleInputMobile">Mobile</label>
        <input type="tel" required minlength="10" maxlength="10" name="phone" class="form-control" id="exampleInputMobile"  placeholder="Enter mobile number">

      </div>

      <div class="form-group">
        <label for="body_number">Car Body (chassis) number</label>
        <input type="text" required minlength="5" maxlength="20" name="body_number" class="form-control" id="body_number" placeholder="Car chasis number" onblur="body_number_check()" >

      </div>

      <div class="form-group">
        <label for="model_name">Car model name</label>
        <input class="form-control" type="text" id="model_name" required value="Automatically fetch" readonly>
      </div>



    <div class="form-group">
      <label for="exampleInputEmail">Email address</label>
      <input type="email" required minlength="4" maxlength="50" name="email" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter email">
    </div>



    <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
      <input type="password" required minlength="4" maxlength="20" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
    </div>


    <div class="form-group">
        <label for="exampleInputPassword2">Confrim Password</label>
        <input type="password" minlength="4" maxlength="20" name="password_confirmation" required class="form-control" id="exampleInputPassword2" placeholder="Retype your password">
    </div>


    <div class="form-check">
      <input required type="checkbox" class="form-check-input" id="exampleCheck2" >
      <label class="form-check-label" for="exampleCheck2">Accept privacy policies</label>
    </div
    <br/>
    <br/>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>


<br/>





<script>
    $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});

            function body_number_check()
            {
               var name = $("#body_number").val();
                  $.ajax({
                        type: 'POST',
                        url: "{{route('ajax_body_num')}}",
                        data: {body_number: name},
                         success: function(result)
                         {
                            $("#model_name").val(result["model_name"]);
                         }
                  });
              }


</script>




@endsection

@section('footer')
@parent
@endsection
