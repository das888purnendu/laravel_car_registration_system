<?php

namespace App\Http\Controllers;
use App\car_models;
use App\users;


use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class signup extends Controller
{
    function registration(Request $req)
    {
        $req->validate([
            "name"=>"required|min:3|max:50",
            "phone"=>"required|numeric|min:10|unique:users,phone",
            "body_number"=>"required|exists:car_models,body_number",
            "email"=>"required|email:rfc,dns|unique:users,email",
            "password"=>"required |confirmed| min:3 | max:50",
        ]);

       $hashed = Hash::make($req->input('password'));


       $user = new users;
       $user->email = $req->email;
       $user->name = $req->name;
       $user->phone = $req->phone;
       $user->password = $hashed;
       $user->save();
       $id = $user->id;

       car_models::where('body_number',$req->body_number)
          ->update(['user_id' => $id]);

          return view('success');
    }
}
