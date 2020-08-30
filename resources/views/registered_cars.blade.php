@extends('admin_master')
@section('title','Registered Cars')

@section('nav')
@parent
@endsection

@section('main')





    <h4 class="text-primary text-center">Registered cars</h4>
    <br/>

        <table  class="table table-striped">
            <tr>
            <th>Photo</th>
            <th>Sl</th>
            <th>Owner name</th>
            <th>Registration number</th>
            <th>Chassis number</th>
            <th>Car model name</th>
            <th>Company</th>
            <th>Phone</th>
            <th>email</th>
            <th>Reg. date</th>

            <th>Delete</th>
            </tr>
    @php
    $count=0
    @endphp
    @foreach ( $users as $row )
            <tr>
                <td><a href="storage\uploads\car_img\{{$row->model_id}}.jpg" target="_blank"><img class="img" src="storage\uploads\car_img\{{$row->model_id}}.jpg" alt="car image" height="50" ></a></td>
                <td>{{++$count}}.</td>
                <td>{{$row->owner_name}}</td>
                <td>{{$row->reg_number}}</td>
                <td>{{$row->body_number}}</td>
                <td>{{$row->car_model_name}}</td>
                <td>{{$row->company}}</td>
                <td>{{$row->phone}}</td>
                <td>{{$row->email}}</td>
                <td>{{$row->date}}</td>

                <td><a class="btn btn-danger" href="delete/{{$row->user_id}}/{{$row->model_id}}">Delete</a></td>

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
