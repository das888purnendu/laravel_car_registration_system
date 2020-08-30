@extends('admin_master')
@section('title','Admin Dashboard')

@section('nav')
@parent
@endsection

@section('main')

    <div class="container" style="min-height: 500px;">

        <h3 class="text-center text-muted">Admin panel</h3>

        <div class="container bg-light text-center">

            <a class="btn btn-danger" href="pending_requests">Pending requests</a>

            <a class="btn btn-primary" href="add_cars">Add New Car</a>

            <a class="btn btn-success" href="registered_cars">Registered Cars</a>

            <a class="btn btn-info" href="unregistered_cars">Unregistered Cars</a>



        </div>
        <br/>
        <br/>
        <br/>



        <div class="container bg-light" style="width: 30rem; font-weight:bold;">

            <ul class="list-group">
                <li class="list-group-item bg-light">Pending requests :  {{$pen}}</li>

                <li class="list-group-item bg-light">Registered Cars :  {{$reg}}</li>

                <li class="list-group-item bg-light">Approved Users :  {{$appr}}</li>
              </ul>
        </div>

    </div>

@endsection

@section('footer')
@parent
@endsection
