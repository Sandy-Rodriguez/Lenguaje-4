<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tarea;
use App\Models\Proyecto;
use App\Models\Usuario;


class DatabaseSeeder extends Seeder
{
    
    public function run(): void
    {

        $this->call(TareasSeeder::class);

        $this->call(ProyectosSeeder::class);

        $this->call(UsuariosSeeder::class);

    }
}
