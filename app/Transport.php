<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transport extends Model
{
    protected $table = "transport";
    protected $fillable = ['model', 'status'];
}
