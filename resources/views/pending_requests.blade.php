@extends('admin_master')
@section('title','Pending requests')

@section('nav')
@parent
@endsection

@section('main')

<div class="container">


<h4 class="text-primary text-center">Pending registration requests</h4>
<br/>

    <table  class="table table-striped">
        <tr>
        <th>Sl</th>
        <th>Owner name</th>
        <th>Chassis number</th>
        <th>Car model name</th>
        <th>Phone</th>
        <th>email</th>
        <th>date</th>

        <th>Cancle</th>
        <th>Approve</th>

        </tr>
@php
$count=0
@endphp
@foreach ( $users as $row )
        <tr>
            <td>{{$count++}}</td>
            <td>{{$row->owner_name}}</td>
            <td>{{$row->body_number}}</td>
            <td>{{$row->car_model_name}}</td>
            <td>{{$row->phone}}</td>
            <td>{{$row->email}}</td>
            <td>{{$row->date}}</td>

            <td><a class="btn btn-danger" href="cancel/{{$row->user_id}}/{{$row->model_id}}">Cancel</a></td>
            <td><a class="btn btn-success" href="approve/{{$row->user_id}}/{{$row->model_id}}">Approve</a></td>
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
    <td>--</td>

    <td>--</td>
    <td>--</td>
</tr>
@endif
    </table>

</div>


{{ $users->links() }}
@endsection

@section('footer')
@parent
@endsection
