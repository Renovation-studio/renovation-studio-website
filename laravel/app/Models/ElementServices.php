<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ElementServices extends Model
{
    public function elements(): BelongsTo {
        return $this->belongsTo(Elements::class);
    }
    public function services(): BelongsTo {
        return $this->belongsTo(Services::class);
    }
}
