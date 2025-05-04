<?php

namespace App\Livewire\Admin\Users;

use App\Repository\UserRepository;
use Illuminate\View\View;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class EditUser extends Component
{
    protected $repository;

    public $userId;

    public $name;
    public $email;

    public $userProfiles;

    public $permissions;

    public $profiles;


    public function __construct()
    {
        $this->repository = new UserRepository();
    }


    public function mount($userId): void
    {
        $this->userId = $userId;
        $user = $this->repository->findById($this->userId);

        $this->name = $user->name;
        $this->email = $user->email;
        $this->userProfiles = $user->profiles_formatted;
        $this->profiles = Role::all();

        $this->permissions = $user->getAllPermissions()->pluck('name');

    }

    public function render(): View
    {
        return view('livewire.admin.users.edit-user');
    }

    public function linkRole($profile): void
    {
        try {
            $this->repository->findById($this->userId)->assignRole($profile);
            session()->flash('success', 'Perfil vinculado com sucesso!');
        } catch (\Exception $e) {
            session()->flash('error', 'Houve um erro ao vincular perfil!');
            \Log::error($e->getMessage());
        }
        redirect()->route('admin.users.edit', $this->userId);
    }

    public function unlinkRole($profile): void
    {
        try {
            $this->repository->findById($this->userId)->removeRole($profile);
            session()->flash('success', 'Perfil desvinculado com sucesso!');
        } catch (\Exception $e) {
            session()->flash('error', 'Erro ao desvincular perfil!');
            \Log::error($e->getMessage());
        }
        redirect()->route('admin.users.edit', $this->userId);
    }
}
