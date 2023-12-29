<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Services extends Model
{
    protected $table = 'services';
    protected $hidden = ['created_at', 'updated_at'];

    public function elements(): BelongsToMany {
        return $this->belongsToMany(
            Elements::class,
            'element_services',
            'services_id',
            'elements_id'
        );
    }
}
