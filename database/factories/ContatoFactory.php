<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contato>
 */
class ContatoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nome' => $this->faker->name(),
            'telefone'=> $this->faker->tollFreePhoneNumber(),
            'email'=> $this->faker->unique()->safeEmail(),
            'motivo_contato_id'=> $this->faker->numberBetween(1,3),
            'mensagem'=> $this->faker->text()
        ];
    }
}
