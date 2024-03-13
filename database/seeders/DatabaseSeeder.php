<?php

namespace Database\Seeders;

use App\Models\Cart;
use App\Models\DetailTransaction;
use App\Models\Drug;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // $this->call([DrugSeeder::class, TransactionSeeder::class]);
        User::factory(10)
            ->has(Cart::factory(3)->state(function (array $attributes, user $user) {
                return [
                    'user_id' => $user->id,
                    'drug_id' => Drug::factory()
                        ->has(
                            DetailTransaction::factory(10)
                                ->for(Transaction::factory()->state([
                                    'user_id' => $user->id,
                                ]))
                        )
                        ->create()
                        ->id,
                ];
            }))
            ->create();
    }
}
