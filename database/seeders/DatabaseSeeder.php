<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        \App\Models\User::factory()->create([
            'name' => 'Agente 1',
            'email' => 'agente1@example.com',
        ]);
        \App\Models\User::factory()->create([
            'name' => 'Agente 2',
            'email' => 'agente2@example.com',
        ]);
        \App\Models\User::factory()->create([
            'name' => 'Agente 3',
            'email' => 'agente3@example.com',
        ]);
        \App\Models\User::factory()->create([
            'name' => 'Agente 4',
            'email' => 'agente4@example.com',
        ]);
        \App\Models\User::factory()->create([
            'name' => 'Agente 5',
            'email' => 'agente5@example.com',
        ]);
        \App\Models\User::factory()->create([
            'name' => 'Agente 6',
            'email' => 'agente6@example.com',
        ]);
        \App\Models\User::factory()->create([
            'name' => 'Agente 7',
            'email' => 'agente7@example.com',
        ]);
        \App\Models\User::factory()->create([
            'name' => 'Agente 8',
            'email' => 'agente8@example.com',
        ]);
        \App\Models\User::factory()->create([
            'name' => 'Agente 9',
            'email' => 'agente9@example.com',
        ]);
        \App\Models\User::factory()->create([
            'name' => 'Agente 10',
            'email' => 'agente10@example.com',
        ]);
        
        \App\Models\Numeros::factory(100)->create();

        \App\Models\Customers::factory(100)->create();
    }
}
