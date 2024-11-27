<?php

namespace Database\Factories;

use App\Models\Transaction;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransactionFactory extends Factory
{
    protected $model = Transaction::class;

    public function definition(): array
    {
        return [
            'date' => $this->faker->date(),
            'fund_type' => 'Fond général',
            'donation_type' => 'Virement',
            'description' => $this->faker->text(),
            'amount' => $this->faker->numberBetween(-10000,100000),
        ];
    }
}
