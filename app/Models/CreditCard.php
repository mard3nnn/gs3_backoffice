<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CreditCard extends Model
{

    protected $fillable = [
        'user_id',
        'number',
        'card_name',
        'best_purchase_day',
        'limit',
    ];

    protected $appends = ['formatted_limit'];

    public function getFormattedLimitAttribute():String // formatted_limit
    {
        return 'R$ ' . number_format($this->getAttribute('limit'), 2, ',', '.');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }
}
