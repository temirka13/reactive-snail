<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Drivers extends Model
{
    protected $table = 'drivers';
    protected $fillable = ['first_name', 'second_name'];
}
