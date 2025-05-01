<?php

namespace App\Livewire\Admin\CreditCard;

use App\Repository\CreditCard\CreditCardRepository;
use Livewire\Component;
use Livewire\WithPagination;

class ListComponent extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    protected $repository;

    public $search;
    public function __construct()
    {
        $this->repository = new CreditCardRepository();
    }
    public function render()
    {
        $cardList = $this->repository->list(perPage: 2);
        return view('livewire.admin.credit-card.list-component', compact('cardList'));
    }
}
