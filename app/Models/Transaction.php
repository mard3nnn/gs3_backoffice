<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'transaction_type',
        'title',
        'description',
        'amount',
        'installments',
        'credit_card_id',
    ];

    public function creditCard()
    {
        return $this->belongsTo(CreditCard::class);
    }
}
