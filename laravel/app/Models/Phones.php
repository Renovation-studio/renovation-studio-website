<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Phones extends Model
{
    protected $table = 'phone_numbers';

    protected $fillable = ['phone'];
}
