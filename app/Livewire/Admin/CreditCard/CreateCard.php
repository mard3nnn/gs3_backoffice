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
    public int $linkedUser;

    public bool $isUpdate;
    public int $cardId;
    public $userList;

    protected CreditCardRepository $repository;

    protected array $rules = [
        'cardNumber' => 'required',
        'cardName' => 'required|string|max:255',
        'bestPurchaseDay' => 'required|integer|min:1|max:31',
        'limit' => 'required|numeric|min:0',
        'userId' => 'required|exists:users,id'
    ];

    protected array $messages = [
        'cardNumber.required' => 'O número do cartão é obrigatório.',
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

    public function mount($isUpdate, $cardId): void
    {
        $userRepository = new UserRepository();
        $this->userList = $userRepository->list(paginate: false);

        $this->isUpdate = $isUpdate;
        $this->cardId = $cardId;

        if($this->isUpdate) {
            $repository = new CreditCardRepository();
            $creditCard = $repository->findById($cardId);

            $this->seedData($creditCard);
            $this->userId = $creditCard->user_id;
        }
    }


    public function render(): View
    {
        return view('livewire.admin.credit-card.create-card');
    }

    public function updated($propertyName): void
    {
        $this->validateOnly($propertyName);
    }

    private function seedData($creditCard): void
    {
        $this->cardNumber = $creditCard->number;
        $this->cardName = $creditCard->card_name;
        $this->bestPurchaseDay = $creditCard->best_purchase_day;
        $this->limit = $creditCard->limit;
        $this->linkedUser = $creditCard->user_id;
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

        if ($this->isUpdate) {
            $this->updateCard($data);
        } else {
            $this->saveCard($data);
        }

    }

    private function updateCard($data): void
    {
        $repository = new CreditCardRepository();
        $response = $repository->update($this->userId, $data);

        if ($response['error']) {
            session()->flash('error', 'Erro ao atualizar o cartão de crédito: ' . $response['message']);
        } else {
            session()->flash('success', 'Cartão de crédito atualizado com sucesso!');
        }
    }

    private function saveCard($data): void
    {
        $repository = new CreditCardRepository();
        $response = $repository->update($this->userId, $data);

        if ($response['error']) {
            session()->flash('error', 'Erro ao criar o cartão de crédito: ' . $response['message']);
        } else {
            session()->flash('success', 'Cartão de crédito criado com sucesso!');
        }
    }
}
