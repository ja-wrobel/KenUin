<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\RelationshipTraits\HasUserGameRuns;
use App\Models\RelationshipTraits\HasUserGameScores;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property-read int $id
 * @property string $name
 * @property string $type
 * @property string $description
 * @property string $dir_path
 * @property-read Carbon|null $created_at
 * @property-read Carbon|null $updated_at
 *
 * @property-read Collection<GameTopScore> $gameTopScores
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

    public function gameTopScores(): HasMany
    {
        return $this->hasMany(GameTopScore::class);
    }
}
