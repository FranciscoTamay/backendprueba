<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Producto;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Producto>
 */
class ProductoFactory extends Factory
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
            'folio'=>$this->faker->sentence(2),
            'nombre'=>$this->faker->name,
            'precio'=>$this->faker->randomFloat(2,10,500),
            'cantidad'=>rand(10,100)

        ];
    }
}
