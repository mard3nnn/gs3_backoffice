<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Transaction;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Transaction::create([
            'transaction_type' => 0,
            'title' => 'Store A Purchase',
            'description' => 'Purchase at Store A',
            'amount' => 100.50,
            'installments' => 1,
            'credit_card_id' => 3,
        ]);

        Transaction::create([
            'transaction_type' => 1,
            'title' => 'Store B Purchase',
            'description' => 'Purchase at Store B',
            'amount' => 250.00,
            'installments' => 2,
            'credit_card_id' => 3,
        ]);

        Transaction::create([
            'transaction_type' => 2,
            'title' => 'Store C Purchase',
            'description' => 'Purchase at Store C',
            'amount' => 75.25,
            'installments' => 1,
            'credit_card_id' => 3,
        ]);
    }
}
