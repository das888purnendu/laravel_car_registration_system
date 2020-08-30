@extends('admin_master')
@section('title','Add new car')

@section('nav')
@parent
@endsection

@section('main')

<h3 class="text-center text-muted">Add new car</h3>


    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


<form class="container bg-light" style="width: 30rem;" method="post" action="{{route('add_car_data')}}" enctype="multipart/form-data" >
    @csrf
    <div class="form-group">
        <b> <label for="exampleInputPassword1">1. Car company</label></b>
        <select class="form-control" name="company_code" required >
            @foreach ($companies as $company)
                <option value="{{$company['id']}}">{{$company['name']}}</option>
            @endforeach
         </select>
      </div>


    <div class="form-group">
        <b><label for="exampleInputName">2. Model Name</label></b>
        <input type="text" required minlength="3" maxlength="50" name="model_name" class="form-control" id="exampleInputName"  placeholder="Enter car model name">

      </div>



      <div class="form-group">
        <b><label for="exampleInputcar">3. Car Body (chassis) number</label></b>
        <input type="text" required minlength="5" maxlength="20" name="body_number" class="form-control" id="exampleInputcar" placeholder="Car chasis number">

      </div>


    <div class="form-group">
        <b><label for="exampleInputEmail">4. Car color</label></b>
        <select class="form-control" name="color_code" required >
            @foreach ($colors as $color)
                <option value="{{$color['id']}}">{{$color['color']}}</option>
            @endforeach
        </select>
    </div>


    <div class="form-group">
        <b><label for="exampleInputEmail">5. Car Fuel type</label></b>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="fuel_type" id="exampleRadios1" value="petrol" checked>
            <label class="form-check-label" for="exampleRadios1">Petrol</label>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="fuel_type" id="exampleRadios2" value="diesel" >
            <label class="form-check-label" for="exampleRadios2">Diesel</label>
        </div>


    </div>

    <div class="form-group">
        <b><label>6. Car Photo (Must be in 2MB and jpg)</label></b>
        <input class="form-control-file" type="file" id="imgInp"  name="photo" accept="image/jpeg"  value="" required>

        <br>

        <div  class="container" id="img_prv"  style="display: none;">
            <br>
            <img class="image" id="imgprv" src="" alt="your image" style="border: 5px solid black;max-height: 300px; max-width: 100%;"  />

            <div class="text-center">
            <br/>

            <a id="delphoto" class="btn btn-danger text-white text-center"><b>Remove Photo</b></a>
            </div>

        </div>

    </div>


    <br/>
    <br/>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

<br/>


<script  type="text/javascript" >


    $('#delphoto').click(function(){
        $('#img_prv').hide();
        $('#imgInp').val('');
    });

    $("#imgInp").change(function() {
    var imgPath = $(this)[0].value;
    var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
    var size=Math.round((this.files[0].size)/1024);
    if(extn == "jpg" || extn == "jpeg")
        {
            if(size<2024)
                {
                    readURL(this);
                }
            else
                {
                    alert("Image size is large !");
                    $("#imgInp").val('');
                    $("#img_prv").hide();
                }
        }

    else
        {
            alert("File Must be in JPG or JPEG  Image format !");
            $("#imgInp").val('');
            $("#img_prv").hide();
        }
    });

    function readURL(input) {
    $("#img_prv").show();
    if (input.files && input.files[0])
    {
        var reader = new FileReader();
        reader.onload = function(e){
        $('#imgprv').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
</script>




@endsection

@section('footer')
@parent
@endsection
