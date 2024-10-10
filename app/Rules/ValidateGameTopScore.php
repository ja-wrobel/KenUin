<?php

declare(strict_types=1);

namespace App\Rules;

use App\Models\GameTopScore;
use Closure;
use Illuminate\Contracts\Validation\DataAwareRule;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidateGameTopScore implements DataAwareRule, ValidationRule
{

    protected $data = [];

    public function setData(array $data)
    {
        $this->data = $data;

        return $this;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $entries = GameTopScore::where([
            ['user_id', '=', $this->data['user_id']],
            ['game_id', '=', $this->data['game_id']],
        ]);
        if($entries->count() < 10){
            return;
        }
        $worst_score = $entries->min('score');

        switch ($attribute) {
            case 'score':
                if($value <= $worst_score){
                    $fail('The :attribute value is not better than last :attribute value.');
                }
                break;

            case 'time':
                if($this->data['score'] !== $worst_score) break;// for now I will keep it like that,
                                                                // in future I plan to summarize `score & time & tries` into one overall value which will determine if score is better,
                                                                // so `time & tries` values might matter more, though not sure how to do it at the moment
                $time = $entries->where('score', '=', $worst_score)
                    ->get('time')[0]->time;
                if($value > $time){
                    $fail('The :attribute value is not better than last score :attribute value.');
                }
                break;

            case 'tries':
                if($this->data['score'] !== $worst_score) break;//

                $tries = $entries->where('score', '=', $worst_score)
                    ->get('tries')[0]->tries;
                if($value > $tries){
                    $fail('The :attribute value is not better than last score :attribute value.');
                }
                break;

            default:
                $fail('Wrong attribute...');
                break;
        }
    }
}
