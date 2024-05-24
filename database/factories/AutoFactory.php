<?php

namespace Database\Factories;

use App\Models\Auto;
use Illuminate\Database\Eloquent\Factories\Factory;

class AutoFactory extends Factory
{
    protected $model = Auto::class;

    public function definition()
    {
        return [
            'naam' => $this->faker->word,
            'merk' => $this->faker->word,
            'brandstof_id' => 1,
        ];
    }
}
