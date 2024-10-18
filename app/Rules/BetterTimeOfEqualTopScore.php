<?php

declare(strict_types=1);

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\DataAwareRule;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Database\Eloquent\Collection;

class BetterTimeOfEqualTopScore implements ValidationRule, DataAwareRule
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

        $equal_score = $this->entries->where('score', $this->data['score']);
        if ($equal_score->isEmpty()) {
            return;
        }

        $worst_time = $equal_score->max('time');
        if ($value > $worst_time) {
            $fail('The :attribute value is not better than last :attribute value.');
        }
    }
}
