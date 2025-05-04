<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $virtualCards = 'see virtual cards';
        $additionalCards = 'see additional card';
        $seeInsurance = 'see insurance';
        $seeSms = 'see sms';
        $seeVip = 'see vip';

        $permissions = collect([
            $virtualCards, $additionalCards, $seeInsurance, $seeSms, $seeVip,
        ]);

        $role1 = Role::create(['name' => 'Perfil 1']);
        $role2 = Role::create(['name' => 'Perfil 2']);
        $role3 = Role::create(['name' => 'Perfil 3']);
        $role4 = Role::create(['name' => 'Perfil 4']);

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        $role1->givePermissionTo([
            $virtualCards,
            $additionalCards
        ]);

        $filteredPermissions = $permissions->reject(function ($permission) use ($virtualCards, $additionalCards) {
            return in_array($permission, [$virtualCards, $additionalCards]);
        });
        $role2->givePermissionTo($filteredPermissions);

        $role3->givePermissionTo($permissions);

    }

}
