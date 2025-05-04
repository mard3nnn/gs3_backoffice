<?php

namespace Database\Seeders;

use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $user1 = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $user2 = User::factory()->create([
            'name' => 'GS1 Test',
            'email' => 'gs1@example.com',
        ]);

        $user3 = User::factory()->create([
            'name' => 'GS2 Test',
            'email' => 'gs2@example.com',
        ]);

        $user4 = User::factory()->create([
            'name' => 'GS3 Test',
            'email' => 'gs3@example.com',
        ]);

        $this->call([
            CreditCardSeeder::class,
            TransactionSeeder::class,
            RoleSeeder::class,
        ]);

        $user1->assignRole('Perfil 1');
        $user2->assignRole('Perfil 2');
        $user3->assignRole('Perfil 3');
        $user4->assignRole('Perfil 4');
    }
}
