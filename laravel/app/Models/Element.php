<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Element extends Model
{
    protected $table = 'elements';
    protected $fillable = ['description', 'element_service_id', 'cost', 'work_duration', 'title'];
    protected $hidden = ['created_at', 'updated_at'];
}
