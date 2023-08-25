<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Proyecto;


class ProyectoFactory extends Factory
{
    
    public function definition(): array
    {
        return [
           'nombre'=>fake()->firstname(),
           'descripcion'=>fake()->text(), //text = texto largo
           'fecha_inicio'=>fake()->datetime(),
           'fecha_fin'=>fake()->datetime(),
        ];
    }
}


