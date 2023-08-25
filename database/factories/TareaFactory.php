<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Tarea;

class TareaFactory extends Factory
{
    
    public function definition(): array
    {
        return [
            'nombre'=>fake()->firstname(),
            'descripcion'=>fake()->text(), //text = texto largo
            'estado'=>fake()->randomElement(['pendiente', 'progreso', 'completada']),
            'fecha_inicio'=>fake()->datetime(),
            'fecha_fin'=>fake()->datetime(),
            'proyecto_id'=>fake()->numberBetween(1,500),
            'usuario_id'=>fake()->numberBetween(1,1000)

        ];
    }
}
