<?php

namespace Database\Seeders;

use App\Models\CreditCard;
use Illuminate\Database\Seeder;
use App\Models\Transaction;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @throws \Exception
     */
    public function run(): void
    {
        $card = CreditCard::where('card_name', 'Cartão Principal')->first();

        if (!$card) {
            throw new \Exception('Cartão Principal não encontrado. Execute o seeder de cartões primeiro.');
        }

        Transaction::create([
            'transaction_type' => 0,
            'title' => 'Store A Purchase',
            'description' => 'Purchase at Store A',
            'amount' => 100.50,
            'installments' => 1,
            'credit_card_id' => $card->id,
        ]);

        Transaction::create([
            'transaction_type' => 1,
            'title' => 'Store B Purchase',
            'description' => 'Purchase at Store B',
            'amount' => 250.00,
            'installments' => 2,
            'credit_card_id' => $card->id,
        ]);

        Transaction::create([
            'transaction_type' => 2,
            'title' => 'Store C Purchase',
            'description' => 'Purchase at Store C',
            'amount' => 75.25,
            'installments' => 1,
            'credit_card_id' => $card->id,
        ]);
    }
}
