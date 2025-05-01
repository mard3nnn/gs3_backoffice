<?php

namespace App\Repository\CreditCard;

use App\Models\CreditCard;
use App\Repository\Base\BaseRepository;

class CreditCardRepository extends BaseRepository
{
    public function __construct()
    {
        parent::__construct(new CreditCard());
    }
}