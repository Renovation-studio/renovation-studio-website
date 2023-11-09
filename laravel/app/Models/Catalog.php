<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    protected $table = 'services';
    protected $fillable = ['img', 'description', 'element_service_id', 'cost', 'title'];
    protected $hidden = ['created_at', 'updated_at'];
}
