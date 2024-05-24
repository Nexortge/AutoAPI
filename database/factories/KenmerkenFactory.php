<?php

namespace Database\Factories;

use App\Models\Kenmerken;
use Illuminate\Database\Eloquent\Factories\Factory;

class KenmerkenFactory extends Factory
{
    protected $model = Kenmerken::class;

    public function definition()
    {
        return [
            'brandstof_type' => $this->faker->word,
        ];
    }
}
