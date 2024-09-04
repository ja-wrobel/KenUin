<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserGameScore extends Model
{
    use HasFactory;

    protected $fillable = [
        'score',
        'score_time',
        'score_tries',
        'score_date',
    ];
}
