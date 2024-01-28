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
        \App\Models\Roles::factory()->create(['roles' => 'regular']);

        \App\Models\Estados::factory()->create(['estados' => 'ventanilla']);
        \App\Models\Estados::factory()->create(['estados' => 'preparacion']);
        \App\Models\Estados::factory()->create(['estados' => 'caja']);
        \App\Models\Estados::factory()->create(['estados' => 'entrega']);
        \App\Models\Estados::factory()->create(['estados' => 'pausado']);
        \App\Models\Estados::factory()->create(['estados' => 'cancelado']);
        \App\Models\Estados::factory()->create(['estados' => 'finalizado']);

        \App\Models\Filas::factory()->create(['filas' => 'Comun']);
        \App\Models\Filas::factory()->create(['filas' => 'Emergencia']);
        \App\Models\Filas::factory()->create(['filas' => 'FNR']);
        \App\Models\Filas::factory()->create(['filas' => 'Prioridad']);

        \App\Models\UserPosition::factory()->create(['position' => 'sin asignar']);
        \App\Models\UserPosition::factory()->create(['position' => 'ventanilla']);
        \App\Models\UserPosition::factory()->create(['position' => 'preparacion']);
        \App\Models\UserPosition::factory()->create(['position' => 'entrega']);
        \App\Models\UserPosition::factory()->create(['position' => 'caja']);
        \App\Models\UserPosition::factory()->create(['position' => 'pausado']);

        \App\Models\User::factory()->create(['name' => 'admin','email' => 'admin@example.com','roles_id' => 1, 'positions_id' => 1]);
        \App\Models\User::factory()->create(['name' => 'Marcos','email' => 'ceci@example.com','roles_id' => 2 , 'positions_id' => 1]);
        \App\Models\User::factory()->create(['name' => 'Diego','email' => 'vero@example.com','roles_id' => 2 , 'positions_id' => 1]);
        \App\Models\User::factory()->create(['name' => 'Gimena','email' => 'luci@example.com','roles_id' => 2 , 'positions_id' => 1]);
        \App\Models\User::factory()->create(['name' => 'Diana','email' => 'vale@example.com','roles_id' => 2 , 'positions_id' => 1]);
        \App\Models\User::factory()->create(['name' => 'Marcela','email' => 'marcos@example.com','roles_id' => 2 , 'positions_id' => 1]);
        \App\Models\User::factory()->create(['name' => 'Pepe','email' => 'fabi@example.com','roles_id' => 2 , 'positions_id' => 1]);
        \App\Models\User::factory()->create(['name' => 'Ricardo','email' => 'generico@example.com','roles_id' => 2 , 'positions_id' => 1]);
        \App\Models\User::factory()->create(['name' => 'Miguel','email' => 'generico2@example.com','roles_id' => 2 , 'positions_id' => 1]);
        
        \App\Models\Numeros::factory(20)->create();

        \App\Models\Customers::factory(100)->create(); 
    }
}
