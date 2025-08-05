<?php

namespace Database\Factories;

use App\Models\Draw;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class DrawFactory extends Factory
{
    protected $model = Draw::class;

    public function definition(): array
    {
        return [
            'winners' => $this->faker->name(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
