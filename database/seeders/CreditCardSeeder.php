<?php

namespace Database\Seeders;

use App\Models\CreditCard;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreditCardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::first();

        CreditCard::create([
            'user_id' => $user->id,
            'number' => '1111 2222 3333 4444',
            'card_name' => 'Cartão Principal',
            'best_purchase_day' => 10,
            'limit' => 5000.00,
        ]);

        CreditCard::create([
            'user_id' => $user->id,
            'number' => '5555 6666 7777 8888',
            'card_name' => 'Cartão Secundário',
            'best_purchase_day' => 15,
            'limit' => 3000.00,
        ]);
    }
}
