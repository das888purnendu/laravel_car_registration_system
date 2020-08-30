<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class car_maps extends Model
{
    public $timestamps = false;
    protected $visible = ['id','model_name','company_code','color_code','fuel_type'];
    protected $fillable = ['id','model_name','company_code','color_code','fuel_type'];
}
