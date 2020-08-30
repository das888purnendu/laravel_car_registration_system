<?php

namespace App\Http\Controllers;
use App\car_models;
use Illuminate\Support\Facades\DB;
use App\car_colors;
use App\car_companies;
use App\car_maps;
use App\users;
use App\registrations;

use Illuminate\Http\Request;

class search extends Controller
{
    function ajax_body_number(Request $req)             // AJAX find non registered car
    {
        $body_number=$req->body_number;
        $car = car_models::where('body_number', '=',$body_number)->first();
        $model_name="Not found !";
        if ($car && $car->user_id==NULL)
        {
            $model_name= car_models::find($car->id)->car_model_total->model_name;
        }
        return response()->json(['model_name'=>$model_name]);
    }


    function search(Request $req)
    {

        $data = DB::table('users')
        ->join('car_models', 'users.id', '=', 'car_models.user_id')
        ->join('car_maps', 'car_models.map_id', '=', 'car_maps.id')
        ->join('car_companies','car_maps.company_code','=','car_companies.id')
        ->join('car_colors','car_maps.color_code','=','car_colors.id')
        ->join('registrations','car_models.id','=','registrations.car_model_id')
        ->where('registrations.registration_number','=',$req->id)
        ->select('users.id as user_id','users.created_at as date','car_maps.id as model_id','users.name as owner_name',
        'car_models.body_number','car_maps.model_name as car_model_name','car_companies.name as company','car_colors.color','car_maps.fuel_type as fuel','registrations.time as reg_date')
        ->first();

        return view("search-result",['data'=>$data,'reg_number'=>$req->id]);
    }




}
