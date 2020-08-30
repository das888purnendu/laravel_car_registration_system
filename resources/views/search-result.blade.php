@extends('master')
@section('title','Search result')

@section('nav')
@parent
@endsection

@section('main')
<h3 class="text-center text-muted">Car details of RC Number : {{$reg_number}} </h3>

@if($data)

<div class="container bg-light" style="width: 30rem;">

        <div class="form-group">
            <label>1. Your car image</label>
            <img src="storage\uploads\car_img\{{$data->model_id}}.jpg" alt="car image" class="img-thumbnail">
        </div>

        <div class="form-group">
            <label>2. Owner full name</label>
        <input type="text" class="form-control" readonly value="{{$data->owner_name}}">
        </div>

        <div class="form-group">
            <label>3. Car model name</label>
            <input type="text" class="form-control" readonly value="{{$data->car_model_name}}">
        </div>

        <div class="form-group">
            <label>4. Car Company name</label>
            <input type="text" class="form-control" readonly value="{{$data->company}}">
        </div>

        <div class="form-group">
            <label>5. Car color </label>
            <input type="text" class="form-control" readonly value="{{$data->color}}">
        </div>

        <div class="form-group">
            <label>6. Fuel type </label>
            <input type="text" class="form-control" readonly value="{{$data->fuel}}">
        </div>

        <div class="form-group">
            <label>7. Car chassis number </label>
            <input type="text" class="form-control" readonly value="{{$data->body_number}}">
        </div>

        <div class="form-group">
            <label>8. Car registration number</label>
        <input type="text" class="form-control" readonly value="{{$reg_number}}">
        </div>

        <div class="form-group">
            <label>9. Registration Date </label>
        <input type="text" class="form-control" readonly value="{{$data->reg_date}}">
        </div>

</div>

@else
<br/>
<h4 class="text-danger text-center">No data found !</h4>

@endif


<br/>
@endsection

@section('footer')
@parent
@endsection
