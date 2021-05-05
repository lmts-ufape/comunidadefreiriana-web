<?php

namespace Database\Factories;

use App\Models\Instituicao;
use Illuminate\Database\Eloquent\Factories\Factory;

class InstituicaoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Instituicao::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome' => $this->faker->word(),
            'categoria' => $this->faker->word(),
            'pais' => $this->faker->country() ,
            'estado' => $this->faker->state(),
            'cidade' => $this->faker->city(),
            'endereco' => $this->faker->address(),
            'cep' => $this->faker->postcode(),
            'telefone' => $this->faker->phoneNumber(),
            'email' => 'tosoh33019@httptuan.com',
            'site' => $this->faker->word(),
            'coordenador' => $this->faker->word(),
            'datafundacao' => $this->faker->date('Y/m/d'),
            'NomedaRealizacao' => $this->faker->word(),
            'DatadeRealizacao' => $this->faker->date('Y/m/d'),
            'latitude' => $this->faker->latitude($min = -90, $max = 90),
            'longitude' => $this->faker->longitude($min = -180, $max = 180),
            'info' => $this->faker->word(),

        ];
    }
}
