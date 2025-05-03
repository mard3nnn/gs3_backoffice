<?php

namespace App\Livewire\Admin\CreditCard;

use App\Repository\CreditCard\CreditCardRepository;
use App\Repository\UserRepository;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class CreateCard extends Component
{
    public string $cardNumber;
    public string $cardName;

    public string $bestPurchaseDay;
    public string $limit;
    public int $userId;

    public array $userList;

    protected CreditCardRepository $repository;

    protected array $rules = [
        'cardNumber' => 'required|numeric',
        'cardName' => 'required|string|max:255',
        'bestPurchaseDay' => 'required|integer|min:1|max:31',
        'limit' => 'required|numeric|min:0',
        'userId' => 'required|exists:users,id'
    ];

    protected array $messages = [
        'cardNumber.required' => 'O número do cartão é obrigatório.',
        'cardNumber.numeric' => 'O número do cartão deve ser numérico.',
        'cardName.required' => 'O nome do cartão é obrigatório.',
        'cardName.string' => 'O nome do cartão deve ser uma string.',
        'bestPurchaseDay.required' => 'O melhor dia de compra é obrigatório.',
        'bestPurchaseDay.integer' => 'O melhor dia de compra deve ser um número inteiro.',
        'bestPurchaseDay.min' => 'O melhor dia de compra deve ser pelo menos 1.',
        'bestPurchaseDay.max' => 'O melhor dia de compra deve ser no máximo 31.',
        'limit.required' => 'O limite é obrigatório.',
        'limit.numeric' => 'O limite deve ser numérico.',
        'limit.min' => 'O limite deve ser pelo menos 0.',
        'userId.required' => 'O usuário é obrigatório.',
        'userId.exists' => 'O usuário não existe.'
    ];

    public function mount(): void
    {
        $this->repository = new CreditCardRepository();

        $userRepository = new UserRepository();
        $this->userList = $userRepository->list(paginate: false);
    }


    public function render(): View
    {
        return view('livewire.admin.credit-card.create-card');
    }

    public function updated($propertyName): void
    {
        $this->validateOnly($propertyName);
    }

    public function save(): void
    {
        $data = [
            'number' => $this->cardNumber,
            'card_name' => $this->cardName,
            'best_purchase_day' => $this->bestPurchaseDay,
            'limit' => $this->limit,
            'user_id' => $this->userId
        ];

        $response = $this->repository->create($data);

        if ($response['error']) {
            session()->flash('error', 'Erro ao criar o cartão de crédito: ' . $response['message']);
        } else {
            session()->flash('success', 'Cartão de crédito criado com sucesso!');
        }
    }
}
