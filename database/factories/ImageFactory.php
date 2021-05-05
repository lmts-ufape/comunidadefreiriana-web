<?php

namespace Database\Factories;

use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Image::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'path' => 'images/23/Bi8t1lSalSEF502B9NbgZvwHtiFLazqempbWcCiG.png',
            'nome' => 'teste',
            'instituicaos_id' => $this->faker->randomElement([1, 2])
        ];
    }
}
