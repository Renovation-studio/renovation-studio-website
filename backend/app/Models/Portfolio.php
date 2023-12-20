<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Portfolio extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "area",
        "description",
        "price",
        "what_was_done",
        "picture0_id",
        "picture1_id",
        "picture2_id",
        "picture3_id",
    ];

    public function picture0(): BelongsTo
    {
        return $this->belongsTo(Picture::class);
    }

    public function picture1(): BelongsTo
    {
        return $this->belongsTo(Picture::class);
    }

    public function picture2(): BelongsTo
    {
        return $this->belongsTo(Picture::class);
    }

    public function picture3(): BelongsTo
    {
        return $this->belongsTo(Picture::class);
    }
}
