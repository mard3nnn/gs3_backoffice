<?php

namespace App\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\CreditCard;

class CreditCardsTable extends DataTableComponent
{
    protected $model = CreditCard::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setSearchLive();
        $this->setSearchPlaceholder('Busque por número, nome ou limite');

    }

    public function columns(): array
    {
        return [
            Column::make("#", "id")
                ->sortable(),
            Column::make("Número do cartão", "number")->searchable()
                ->sortable(),
            Column::make("Nome do cartão", "card_name")->searchable()
                ->sortable(),
            Column::make("Melhor dia de compra", "best_purchase_day")
                ->sortable(),
            Column::make("Limit", "limit")->searchable()
                ->sortable(),
            Column::make('Action')
                ->label(
                    fn($row, Column $column) => view('livewire.datatables.action-column')->with(
                        [
                            'viewLink' => route('admin.credit-cards.index', $row),
                            'editLink' => route('admin.credit-cards.index', $row),
                            'deleteLink' => route('admin.credit-cards.destroy', $row),
                        ]
                    )
                )->html()
        ];
    }
}
