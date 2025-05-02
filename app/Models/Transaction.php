<?php

namespace App\Models;

use Carbon\Carbon;
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

    protected $appends = [
        'transaction_type_formatted',
        'amount_formatted',
        'created_at_formatted',
        'date_formatted'
    ];


    public function getTransactionTypeFormattedAttribute(): string // transaction_type_formatted
    {
        return match ($this->getAttribute('transaction_type')) {
            0 => 'Entrada',
            1 => 'Saída',
            2 => 'Estorno',
            default => '...',
        };
    }

    public function getAmountFormattedAttribute() // amount_formatted
    {
        return 'R$ ' . number_format($this->getAttribute('amount'), 2, ',', '.');
    }

    public function getCreatedAtFormattedAttribute(): string  // created_at_formatted
    {
        return Carbon::parse($this->getAttribute('created_at'))
            ->locale('pt_BR')
            ->format('d/m \à\s H:i');
    }

    public function getDateFormattedAttribute(): string  // date_formatted
    {
        return Carbon::parse($this->getAttribute('created_at'))
            ->locale('pt-BR')
            ->translatedFormat('D, d M.');
    }


    public function creditCard()
    {
        return $this->belongsTo(CreditCard::class);
    }
}
