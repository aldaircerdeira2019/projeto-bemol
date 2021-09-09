<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Client::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'cpf'         => $this->faker->unique()->cpf(),
            'birth'       => $this->faker->date('Y_m_d'),
            'phone'       => $this->faker->cellphoneNumber(),
            'user_id'      => $this->faker->unique()->numberBetween(2,51),
        ];
    }
}
