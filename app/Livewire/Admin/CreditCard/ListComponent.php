<?php

namespace App\Livewire\Admin\CreditCard;

use App\Repository\CreditCard\CreditCardRepository;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class ListComponent extends Component
{

    use WithPagination;

    protected string $paginationTheme = 'bootstrap';

    protected CreditCardRepository $repository;

    public String $search;
    public function __construct()
    {
        $this->repository = new CreditCardRepository();
    }
    public function render(): View
    {
        $cardList = $this->repository->list(perPage: 2);
        return view('livewire.admin.credit-card.list-component', compact('cardList'));
    }
}
