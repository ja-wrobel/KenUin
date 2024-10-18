<?php

declare(strict_types=1);

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\DataAwareRule;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Database\Eloquent\Collection;

class LessTriesOfEqualTopScore implements DataAwareRule, ValidationRule
{
    protected $data = [];
    protected Collection $entries;

    public function __construct(Collection $entries)
    {
        $this->entries = $entries;
    }

    public function setData(array $data): static
    {
        $this->data = $data;
        return $this;
    }
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if ($this->entries->count() < 15) {
            return;
        }

        $equal_score = $this->entries
            ->where('score', $this->data['score'])
            ->where('time', $this->data['time']);
        if ($equal_score->isEmpty()) {
            return;
        }

        $worst_try = $equal_score->max('tries');
        if ($value >= $worst_try) {
            $fail('The :attribute value is not better than last :attribute value.');
        }
    }
}
