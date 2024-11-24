<?php

namespace Database\Seeders;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Seeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Quentin',
            'email' => 'quentin.lequeux@student.hepl.be',
        ]);

        Transaction::factory(20)->create([
            'date' => now(),
            'fund_type' => 'Fond général',
            'donation_type' => 'Virement',
            'description' => 'Don',
            'amount' => 10,
        ]);

        Transaction::factory(20)->create([
            'date' => now(),
            'fund_type' => 'Fond de fonctionnement',
            'donation_type' => 'Virement',
            'description' => 'Don',
            'amount' => 20,
        ]);

        Transaction::factory(20)->create([
            'date' => now(),
            'fund_type' => 'Fond spécifique',
            'donation_type' => 'Liquide',
            'description' => 'Don',
            'amount' => 5,
        ]);
    }
}
