<?php

namespace Database\Factories;

use App\Models\Addresse;
use Illuminate\Database\Eloquent\Factories\Factory;

class AddresseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Addresse::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $client_id = range(1,50);

        return [

            'cep'               => '69000-000',
            'logradouro'        => $this->faker->streetName(),
            'bairro'            => $this->faker->citySuffix(),
            'complemento'       => $this->faker->words(5, true),
            'numero'            => $this->faker->numberBetween(10,500),
            'localidade'        => $this->faker->city(),
            'uf'                => $this->faker->stateAbbr(),
            'client_id'         => $this->faker->unique()->randomElement($client_id),

        ];
    }
}
