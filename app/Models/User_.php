<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User_ extends Model
{
    protected $table='users';
    protected $fillable = ['name','email','password','isAuth'];
    public $timestamps = false;
}
