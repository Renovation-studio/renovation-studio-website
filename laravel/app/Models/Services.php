<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Services extends Model
{
    protected $table = 'services';
    protected $hidden = ['created_at', 'updated_at'];
    private string $relatedTableName = 'element_services';
    private string $foreighPivotKey = 'services_id';
    private string $relatedPivotKey = 'elements_id';
    public function elements(): BelongsToMany {
        return $this->belongsToMany(
            Elements::class,
            $this->relatedTableName,
            $this->foreighPivotKey,
            $this->relatedPivotKey
        );
    }
}
