<?php

namespace App\Http\Controllers\Api;

use App\Factory\ResponseFactory;
use App\Http\Controllers\Controller;
use App\Repository\CreditCard\CreditCardRepository;
class CreditCardController extends Controller
{
    protected $repository;

    public function __construct()
    {
        $this->repository = new CreditCardRepository();
    }


    public function index()
    {
        return ResponseFactory::toJson(auth()->user()->creditCards);
    }

    public function history($cardId)
    {

        $result = $this->repository->transactions($cardId);

        if ($result['error'] ?? false) {
            return $result;
        } else {
            return ResponseFactory::toJson($result);
        }

    }

}