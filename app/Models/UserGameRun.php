<?php
declare(strict_types=1);
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserGameRun extends Model
{
    use HasFactory;

    protected $fillable = [
        'official_runs',
        'test_runs'
    ];
}
