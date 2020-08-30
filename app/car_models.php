<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class car_models extends Model
{
    public $timestamps = false;
    protected $visible = ['id','body_number','map_id','user_id'];
    protected $fillable = ['id','body_number','map_id','user_id'];

    function car_model_total()
    {
        return $this->hasMany("App\car_maps","id","id");
    }
}
