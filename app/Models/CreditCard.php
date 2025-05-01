<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CreditCard extends Model
{

    protected $fillable = [
        'user_id',
        'number',
        'card_name',
        'best_purchase_day',
        'limit',
    ];

    public function getFormattedLimitAttribute()// formatted_limit
    {
        return 'R$ ' . number_format($this->limit, 2, ',', '.');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
