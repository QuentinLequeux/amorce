<?php

namespace Database\Factories;

use App\Models\Fund;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransactionFactory extends Factory
{
    protected $model = Transaction::class;

    public function definition(): array
    {
        return [
            'date' => $this->faker->date(),
            'fund_id' => Fund::all()->random()->id,
            'donation_type' => 'Virement',
            'description' => $this->faker->text(),
            'amount' => $this->faker->numberBetween(-1000,10000),
        ];
    }
}
