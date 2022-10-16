<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Club extends Model
{
    public $table = 'clubs';
    public $fillable = ['name','description','membre','membreBureau','president','logo'];
}
