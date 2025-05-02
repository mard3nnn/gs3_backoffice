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

    public function transactions($cardId)
    {
        return $this->model->find($cardId)->transactions;
    }
}
