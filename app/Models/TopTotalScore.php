<?php
declare(strict_types=1);
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopTotalScore extends Model
{
    use HasFactory;

    protected $fillable = [
        'total_score'
    ];
}
