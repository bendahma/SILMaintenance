<?php

namespace Database\Factories;

use App\Models\Machine;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class MachineFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Machine::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'immatriculation' => $this->faker->unique()->randomNumber(NULL,false),
            'numeroSerie' => $this->faker->unique()->randomNumber(NULL,false),
            'type_id' => 1,
            'category_id' => 1,
        ];
    }
}
