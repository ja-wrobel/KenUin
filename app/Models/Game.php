<?php
declare(strict_types=1);

namespace App\Models;

use App\UserGame;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Game extends Model
{
    use HasFactory, UserGame;

    protected $fillable = [
        'name',
        'type',
        'description',
        'difficulty',
        'dir_path'
    ];

    protected $hidden = [
        'dir_path'
    ];

    public function gameTopScores(): HasOne
    {
        return $this->hasOne(GameTopScore::class);
    }
}
