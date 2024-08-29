<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'description',
        'difficulty',
        'DIR_PATH'
    ];

    protected $hidden = [
        'DIR_PATH'
    ];
}
