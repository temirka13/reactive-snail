<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Drivers extends Model
{
    // public function transport()
    // {
    //     return $this->hasMany('App\Model\Transport', 'driver_id', 'id');
    // }

    protected $table = 'drivers';
    protected $fillable = ['first_name', 'second_name', 'user_id', 'transport'];
}
