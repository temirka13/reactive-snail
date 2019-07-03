<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transport extends Model
{

    // public function driver()
    // {
    //     return $this->hasOne('App\Model\Drivers', 'id', 'driver_id');
    // }

    protected $table = "transport";
    protected $fillable = ['model', 'status', 'user_id',  'driver']; //'driver_id',
}
