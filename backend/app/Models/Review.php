<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "text",
        "picture_id",
    ];

    public function picture(): BelongsTo
    {
        return $this->belongsTo(Picture::class);
    }
}
