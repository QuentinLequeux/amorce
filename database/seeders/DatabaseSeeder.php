<?php

namespace Database\Seeders;

use App\Enums\FundType;
use App\Models\Fund;
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
        $this->call([RolesAndPermissionsSeeder::class]);

        User::factory()->create([
            'name' => 'Quentin',
            'email' => 'quentin.lequeux@student.hepl.be',
        ])->each(function ($user) {
            $user->assignRole('admin');
        });

        User::factory()->create([
            'name' => 'Nicolas',
            'email' => 'quent789@gmail.com',
        ])->each(function ($user) {
            $user->assignRole('user');
        });

        foreach (FundType::cases() as $fund) {
            Fund::factory()->create([
                'name' => $fund->value
            ]);
        }
//            'name' => FundType::GeneralFund,

//        Transaction::factory(10)->create();
        Transaction::factory()->create([
            'date' => now(),
            'description' => 'Don',
            'donation_type' => 'Liquide',
            'fund_id' => Fund::all()->random()->id,
//            'fund_type' => 'Fond général',
            'amount' => 22200,
        ]);

//        Transaction::factory(20)->create([
//            'date' => now(),
//            'fund_type' => 'Fond général',
//            'donation_type' => 'Virement',
//            'description' => 'Don',
//            'amount' => 10,
//        ]);
//
//        Transaction::factory(20)->create([
//            'date' => now(),
//            'fund_type' => 'Fond de fonctionnement',
//            'donation_type' => 'Virement',
//            'description' => 'Don',
//            'amount' => 20,
//        ]);
//
//        Transaction::factory(20)->create([
//            'date' => now(),
//            'fund_type' => 'Fond spécifique',
//            'donation_type' => 'Liquide',
//            'description' => 'Don',
//            'amount' => 5,
//        ]);
    }
}
