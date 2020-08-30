@extends('admin_master')
@section('title','Unregistered cars')

@section('nav')
@parent
@endsection

@section('main')




<h4 class="text-primary text-center">Unregistered cars</h4>
<br/>

    <table  class="table table-striped">
        <tr>
        <th>Photo</th>
        <th>Sl</th>


        <th>Chassis number</th>
        <th>Company</th>
        <th>Car model name</th>
        <th>Color</th>



        </tr>
@php
$count=0
@endphp
@foreach ( $users as $row )
        <tr>
            <td><a href="storage\uploads\car_img\{{$row->model_id}}.jpg" target="_blank"><img class="img" src="storage\uploads\car_img\{{$row->model_id}}.jpg" alt="car image" height="50" ></a></td>
            <td>{{++$count}}.</td>


            <td>{{$row->body_number}}</td>
            <td>{{$row->company}}</td>
            <td>{{$row->car_model_name}}</td>
            <td>{{$row->color}}</td>





        </tr>
@endforeach
@if($count==0)
<tr>
    <td>--</td>
    <td>--</td>
    <td>--</td>
    <td>--</td>
    <td>--</td>
    <td>--</td>

</tr>
@endif
</table>

{{ $users->links() }}

@endsection

@section('footer')
@parent
@endsection
