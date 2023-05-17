<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Gatos>
 */
class GatosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'nombre'=>$this->faker->name,
            'precio'=>$this->faker->randomFloat(2,10,500),
            'descripcion'=>$this->faker->text(100),
            'cantidad'=>rand(10,100)
        ];
    }
}
