<?php

declare(strict_types=1);

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\DataAwareRule;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Database\Eloquent\Collection;

class BetterThanWorstTopScore implements DataAwareRule, ValidationRule
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

        $worst_score = $this->entries->min('score');
        if ($value < $worst_score) {
            $fail('The :attribute value is not better than last :attribute value.');
        }
    }
}
