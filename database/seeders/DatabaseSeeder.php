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
        \App\Models\Roles::factory()->create(['roles' => 'admin']);
        \App\Models\Roles::factory()->create(['roles' => 'ventanilla']);
        \App\Models\Roles::factory()->create(['roles' => 'preparacion',]);
        \App\Models\Roles::factory()->create(['roles' => 'entrega']);
        \App\Models\Roles::factory()->create(['roles' => 'caja']);
        \App\Models\Roles::factory()->create(['roles' => 'regular']);

        \App\Models\Estados::factory()->create(['estados' => 'Sin atender']);
        \App\Models\Estados::factory()->create(['estados' => 'En ventanilla']);
        \App\Models\Estados::factory()->create(['estados' => 'En preparación']);
        \App\Models\Estados::factory()->create(['estados' => 'Para pagar']);
        \App\Models\Estados::factory()->create(['estados' => 'Para entregar']);
        \App\Models\Estados::factory()->create(['estados' => 'Pausado']);
        \App\Models\Estados::factory()->create(['estados' => 'Cancelado']);
        \App\Models\Estados::factory()->create(['estados' => 'Finalizado']);

        \App\Models\Filas::factory()->create(['filas' => 'Comun']);
        \App\Models\Filas::factory()->create(['filas' => 'Emergencia']);
        \App\Models\Filas::factory()->create(['filas' => 'FNR']);
        \App\Models\Filas::factory()->create(['filas' => 'Prioridad']);

        \App\Models\User::factory()->create(['name' => 'admin','email' => 'admin@example.com','roles_id' => 1]);
        \App\Models\User::factory()->create(['name' => 'ventanilla 1','email' => 'ceci@example.com','roles_id' => 2]);
        \App\Models\User::factory()->create(['name' => 'ventanilla 2','email' => 'vero@example.com','roles_id' => 3]);
        \App\Models\User::factory()->create(['name' => 'ventanilla 3','email' => 'luci@example.com','roles_id' => 4]);
        \App\Models\User::factory()->create(['name' => 'ventanilla 4','email' => 'vale@example.com','roles_id' => 5]);
        \App\Models\User::factory()->create(['name' => 'Entrega 1','email' => 'marcos@example.com','roles_id' => 6]);
        \App\Models\User::factory()->create(['name' => 'Entrega 2','email' => 'fabi@example.com','roles_id' => 6]);
        \App\Models\User::factory()->create(['name' => 'Preparacion 1','email' => 'generico@example.com','roles_id' => 6]);
        \App\Models\User::factory()->create(['name' => 'Preparacion 2','email' => 'generico2@example.com','roles_id' => 6]);
        
        \App\Models\Customers::factory(100)->create();
        
        \App\Models\Numeros::factory(100)->create();

    }
}
