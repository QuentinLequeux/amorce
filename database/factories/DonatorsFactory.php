<?php

namespace Database\Factories;

use App\Models\Donators;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class DonatorsFactory extends Factory
{
    protected $model = Donators::class;

    public function definition(): array
    {
        $firstDate = $this->faker->dateTimeThisYear()->format('m-Y');
        $secondDate = Carbon::createFromFormat('m-Y', $firstDate)->addMonth()->format('m-Y');
        return [
            'iban' => $this->faker->iban(countryCode: 'BE'),
            'name' => $this->faker->name(),
            'email' => null,
            'phone' => null,
            'address' => null,
            'history' => json_encode([[$firstDate], [$secondDate]]),
        ];
    }
}
