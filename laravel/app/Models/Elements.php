<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Elements extends Model
{
    protected $table = 'elements';
    protected $hidden = ['created_at', 'updated_at'];
    public function elementServices(): HasMany {
        return $this->hasMany(ElementServices::class);
    }
}
