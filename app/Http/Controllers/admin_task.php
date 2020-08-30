<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\car_maps;
use App\car_colors;
use App\car_companies;
use App\car_models;
use App\registrations;
use App\users;


use Illuminate\Http\Request;

class admin_task extends Controller
{
    function add_car_preload()
    {
        if(session('type')=='admin')
        {

            $user = users::where('id', '=',session('auth'))->first();
            if($user->type=='admin')
            {

                $companies=car_companies::select('*')->get();
                $colors = car_colors::select('*')->get();


                return view("add_new_car",['companies'=>$companies,'colors'=>$colors]);
            }
            else
            {
                return redirect()->to('login');
            }


        }
        else
        {
            return redirect()->to('login');
        }
    }







    /*--------------------- Add Car -----------------------*/

    function add_car_data(Request $req)
    {


        $req->validate([
           "company_code"=>"required",
            "model_name"=>"required|min:3|max:50",
            "body_number"=>"required|unique:car_models,body_number",
            "color_code"=>"required",
            "fuel_type"=>"required",
            "photo"=>"required|image"
        ]);

        $new_car_map = new car_maps;
        $new_car_map->model_name = $req->model_name;
        $new_car_map->company_code = $req->company_code;
        $new_car_map->color_code = $req->color_code;
        $new_car_map->fuel_type = $req->fuel_type;
        $new_car_map->save();

        $id = $new_car_map->id;     // New inserted row id

        $new_car_model = new car_models;
        $new_car_model->body_number = $req->body_number;
        $new_car_model->map_id = $id;
        $new_car_model->save();

        $path="public/uploads/car_img/";
        $req->file('photo')->storeAs($path,$id.'.jpg');

        return view('success');

    }











/*--------------------------- Pending requests------------------*/


    function pending_requests()
    {
        if(session('type')=='admin')
        {

            $user = users::where('id', '=',session('auth'))->first();
            if($user->type=='admin')
            {


                $users = DB::table('users')
                ->join('car_models', 'users.id', '=', 'car_models.user_id')
                ->join('car_maps', 'car_models.map_id', '=', 'car_maps.id')
                ->join('car_companies','car_maps.company_code','=','car_companies.id')
                ->where("users.status","unregistered")
                ->select('users.id as user_id','users.created_at as date','car_models.id as model_id','users.name as owner_name','users.email','users.phone',
                'car_models.body_number','car_maps.model_name as car_model_name','car_companies.name as company')
                ->paginate(2);


                return view("pending_requests",["users"=>$users]);
            }
            else
            {
                return redirect()->to('login');
            }
        }
    else
        {
            return redirect()->to('login');
        }
    }














    /*----------------------------- Registration approve-----------------*/


    function approve($u_id,$car_id)
    {
        if(session('type')=='admin')
        {

            $user = users::where('id', '=',session('auth'))->first();
            $car_reg_cnt = registrations::where('car_model_id',$car_id)
            ->get()->count();

            if($user->type=='admin' && $car_reg_cnt==0)
            {
                $registration = new registrations;
                $registration->registration_number=time();
                $registration->car_model_id=$car_id;
                $registration->save();

                users::where('id',$u_id)
                ->update(['status' =>"registered"]);

          return view('success');
            }
            else
            {
                return redirect()->to('login');
            }
        }
    else
        {
            return redirect()->to('login');
        }
    }








    /*----------------------------- Registration Cancel-----------------*/


    function cancel($u_id,$car_id)
    {
        if(session('type')=='admin')
        {

            $user = users::where('id', '=',session('auth'))->first();
            $car_reg_cnt = registrations::where('car_model_id',$car_id)
            ->get()->count();



            if($user->type=='admin' && $car_reg_cnt==0)
            {
                car_models::where("id",$car_id)
                ->update(["user_id"=>null]);

                users::where('id',$u_id)
                ->delete();

                return view('success');
            }
            else
            {

                return redirect()->to('login');
            }
        }
    else
        {

            return redirect()->to('login');
        }
    }












/*----------------------------- Registered cars -----------------*/



function registered_cars()
{
    if(session('type')=='admin')
    {

        $user = users::where('id', '=',session('auth'))->first();
        if($user->type=='admin')
        {


            $users = DB::table('users')
            ->join('car_models', 'users.id', '=', 'car_models.user_id')
            ->join('car_maps', 'car_models.map_id', '=', 'car_maps.id')
            ->join('car_companies','car_maps.company_code','=','car_companies.id')
            ->join('registrations','registrations.car_model_id','=','car_models.id')
            ->select('users.id as user_id','registrations.registration_number as reg_number','registrations.time as date','car_maps.id as model_id','users.name as owner_name','users.email','users.phone',
            'car_models.body_number','car_maps.model_name as car_model_name','car_companies.name as company')
            ->paginate(2);


            return view("registered_cars",["users"=>$users]);
        }
        else
        {
            return redirect()->to('login');
        }
    }
else
    {
        return redirect()->to('login');
    }
}







   /*----------------------------- Registration Delete-----------------*/


   function delete($u_id,$car_id)
   {
       if(session('type')=='admin')
       {

           $user = users::where('id', '=',session('auth'))->first();
           $car_reg_cnt = registrations::where('car_model_id',$car_id)
           ->get()->count();



           if($user->type=='admin' && $car_reg_cnt)
           {
               car_models::where("id",$car_id)
               ->update(["user_id"=>null]);

               users::where('id',$u_id)
               ->delete();

               registrations::where('car_model_id',$car_id)
               ->delete();

               return view('success');
           }
           else
           {

               return redirect()->to('login');
           }
       }
   else
       {

           return redirect()->to('login');
       }
   }









/*----------------------------- Unregistered cars -----------------*/



function unregistered_cars()
{
    if(session('type')=='admin')
    {

        $user = users::where('id', '=',session('auth'))->first();
        if($user->type=='admin')
        {


            $users = DB::table('car_models')
            ->join('car_maps', 'car_models.map_id', '=', 'car_maps.id')
            ->join('car_companies','car_maps.company_code','=','car_companies.id')
            ->join('car_colors','car_maps.color_code','=','car_colors.id')
            ->select('car_maps.id as model_id',
            'car_models.body_number','car_maps.model_name as car_model_name','car_companies.name as company','car_colors.color as color')
            ->paginate(2);


            return view("unregistered_cars",["users"=>$users]);
        }
        else
        {
            return redirect()->to('login');
        }
    }
else
    {
        return redirect()->to('login');
    }
}
















}
