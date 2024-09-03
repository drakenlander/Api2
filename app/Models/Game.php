<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'genre',
        'developer',
        'publisher',
        'is_indie',
        'is_ps',
        'is_xb',
        'is_nin',
        'is_pc',
        'release_date',
    ];
}
