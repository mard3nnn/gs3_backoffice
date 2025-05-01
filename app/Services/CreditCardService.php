<?php

namespace App\Services;

use App\Models\CreditCard;

class CreditCardService extends BaseService
{
    public function __construct()
    {
        parent::__construct(new CreditCard());
    }

}