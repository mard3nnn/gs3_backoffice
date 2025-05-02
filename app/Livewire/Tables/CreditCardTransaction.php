<?php

namespace App\Livewire\Tables;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Transaction;
use Rappasoft\LaravelLivewireTables\Views\Columns\DateColumn;

class CreditCardTransaction extends DataTableComponent
{
    protected $model = Transaction::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setSearchPlaceholder('Busque por título, descrição ou tipo da transação');
    }

    public function columns(): array
    {
        return [
            Column::make("#", "id")->sortable(),
            Column::make("Tipo da transação", "transaction_type")->searchable()->view('partials.tables.transaction_type'),
            Column::make("Título", "title")->searchable()->sortable(),
            Column::make("Descrição", "description")->searchable()->sortable(),
            Column::make("Valor", "amount")->searchable()->view('partials.tables.transaction_amount'),
            Column::make("Parcelas", "installments")->sortable(),
            Column::make("Usuário", "creditCard.user.name")->sortable(),
            DateColumn::make("Data do registro", "created_at")->outputFormat('d/m/Y \à\s H:i')
        ];
    }
}
