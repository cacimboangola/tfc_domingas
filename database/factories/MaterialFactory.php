<?php

namespace Database\Factories;

use App\Models\Categoria;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class MaterialFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'codigo' => Str::random(8),
            'nome' => $this->faker->sentence,
            'perecivel' => $this->faker->boolean,
            'stock_min' => $this->faker->randomDigit(),
            'stock_actual' => $this->faker->randomDigit(),
            'stock_disponivel' => $this->faker->randomDigit(),
            'categoria_id' => Categoria::factory()->create()->id,
            'preco' => $this->faker->randomFloat(2,300, 1000000)
        ];
    }
}
