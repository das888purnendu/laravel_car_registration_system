@extends('admin_master')
@section('title','Admin Dashboard')

@section('nav')
@parent
@endsection

@section('main')
<br/>
<br/>
<div class="text-success">
    <b><h1 class="display-1 text-center">Success !</h1></b>
    <br/>
    <h4 class="text-info text-center"><a class="btn btn-primary" href="{{route('admin_home')}}">Back</a></h4>

</div>

<br/>
@endsection

@section('footer')
@parent
@endsection
