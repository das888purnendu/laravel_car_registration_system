<?php
namespace App\Http\Controllers;

use App\car_models;
use App\users;
use App\registrations;
use App\car_colors;
use App\car_companies;
use App\car_maps;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class login extends Controller
{

    function hash_conv($val)
    {
        return (Hash::make($val));
    }



    function login(Request $req)
    {
        $req->validate([
            "email"=>"required|exists:users,email|email:rfc,dns| min:3 | max:50",
            "password"=>"required | min:3 | max:50",
        ]);

        $user = users::where('email', '=', $req->input('email'))->first();

        if (Hash::check($req->input('password'), $user->password))
        {
            $req->session()->flush();// for deleteing session
            $req->session()->put('auth',$user->id);
            $req->session()->put('type',$user->type);


            if($user->type=="user")
            {
                return redirect()->to('user_home');
            }
            elseif($user->type=="admin")
            {
                return redirect()->to('admin_home');
            }
        }
        else
        {
            return redirect()->to('login')->with('failed','1');
        }

    }





    function admin_home_func(Request $req)
    {
        if(session('type')=='admin')
        {

            $user = users::where('id', '=',session('auth'))->first();
            if($user->type=='admin')
            {

                $pen=users::where('status','=','unregistered')->count();
                $reg = registrations::select('*')->count();
                $appr = users::where('status','=','registered')->count();
                $appr--;

                return view("admin_home",['pen'=>$pen,'reg'=>$reg,'appr'=>$appr]);
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







    /*------------------------ User Login ----------------------------*/

    function user_home_func(Request $req)
    {
        if(session('type')=='user')
        {
            $user = users::where('id', '=',session('auth'))->first();
            if($user->type=='user')
            {

                $reg=$user->status;
                $name = $user->name;
                $car=car_models::where('user_id',session('auth'))->first();
                $body_number = $car->body_number;
                $model = car_models::find($car->map_id)->car_model_total->first();
                $model_name = $model->model_name;
                $fuel=$model->fuel_type;
                $color = car_colors::where("id",$model->color_code)->first()->color;
                $company = car_companies::where("id",$model->company_code)->first()->name;

                if($reg=="registered")
                {
                    $registration = registrations::where("car_model_id",$car->id)->first();
                    $reg_number = $registration->registration_number;
                    $date = $registration-> time;

                    return view("user_home",[
                        "status"=>"registered",
                        "name"=>$name,
                        "body_number"=>$body_number,
                        "model_name" => $model_name,
                        "fuel"=>$fuel,
                        "color"=>$color,
                        "company"=>$company,
                        "reg_number"=>$reg_number,
                        "car_model_id"=>$model->id,
                        "reg_date"=>$date]);
                }

                else
                {
                    return view("user_home",[
                        "status"=>"unregistered",
                        "name"=>$name,
                        "body_number"=>$body_number,
                        "model_name" => $model_name,
                        "car_model_id"=>$car->id,
                        "fuel"=>$fuel,
                        "color"=>$color,
                        "company"=>$company]);
                }

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
