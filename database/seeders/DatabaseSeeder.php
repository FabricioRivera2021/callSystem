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

        \App\Models\User::factory()->create(['name' => 'admin','email' => 'admin@example.com','role' => 'admin']);
        \App\Models\User::factory()->create(['name' => 'ventanilla 1','email' => 'ceci@example.com','role' => 'ventanilla']);
        \App\Models\User::factory()->create(['name' => 'ventanilla 2','email' => 'vero@example.com','role' => 'ventanilla']);
        \App\Models\User::factory()->create(['name' => 'ventanilla 3','email' => 'luci@example.com','role' => 'ventanilla']);
        \App\Models\User::factory()->create(['name' => 'ventanilla 4','email' => 'vale@example.com','role' => 'ventanilla']);
        \App\Models\User::factory()->create(['name' => 'Entrega 1','email' => 'marcos@example.com','role' => 'entrega']);
        \App\Models\User::factory()->create(['name' => 'Entrega 2','email' => 'fabi@example.com','role' => 'entrega']);
        \App\Models\User::factory()->create(['name' => 'Preparacion 1','email' => 'generico@example.com','role' => 'preparacion']);
        \App\Models\User::factory()->create(['name' => 'Preparacion 2','email' => 'generico2@example.com','role' => 'preparacion']);
        \App\Models\User::factory()->create(['name' => 'Caja 1','email' => 'yaque@example.com','role' => 'caja']);
        \App\Models\User::factory()->create(['name' => 'Caja 2','email' => 'pazos@example.com','role' => 'caja']);
        
        \App\Models\Numeros::factory(100)->create();

        \App\Models\Customers::factory(100)->create();
    }
}
