<?php

namespace App\Livewire\Tables;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\User;

class UsersTable extends DataTableComponent
{
    protected $model = User::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setSearchPlaceholder('Busque por nome ou email');
    }

    public function columns(): array
    {
        return [
            Column::make("#", "id")
                ->sortable(),
            Column::make("Nome", "name")
                ->searchable()
                ->sortable(),
            Column::make("Email", "email")
                ->searchable()
                ->sortable(),
            Column::make('Perfis vinculados')
                ->label(
                    fn($row, Column $column) => view('livewire.datatables.user-profile-column')->with(
                        [
                            'content'=> $row
                        ]
                    )
                )->html(),
            Column::make('Ações')
                ->label(
                    fn($row, Column $column) => view('livewire.datatables.action-column')->with(
                        [
                            'editLink' => route('admin.users.edit', $row),
                            'deleteLink' => route('admin.users.destroy', $row),
                        ]
                    )
                )->html()
        ];
    }
}
