<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\RelationshipTraits\HasUserGameRuns;
use App\Models\RelationshipTraits\HasUserGameScores;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property-read int $id
 * @property string $name
 * @property string $type
 * @property string $description
 * @property string $dir_path
 * @property-read Carbon|null $created_at
 * @property-read Carbon|null $updated_at
 *
 * @property-read null|GameTopScore $gameTopScore
 */
class Game extends Model
{
    use HasFactory;
    use HasUserGameRuns;
    use HasUserGameScores;

    protected $fillable = [
        'name',
        'type',
        'description',
        'difficulty',
        'dir_path',
    ];

    protected $hidden = [
        'dir_path',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function gameTopScore(): HasOne
    {
        return $this->hasOne(GameTopScore::class);
    }
}
