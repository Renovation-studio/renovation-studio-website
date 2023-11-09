<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompPracUser extends Model
{
    use HasFactory;
    protected $table = 'comp_prac_users';
//    protected $guarded = [];

    protected $fillable = [
        'id',
        'username',
        'email',
        'phoneNumber',
        'hash',
        'avatarUrl',
    ];
}
