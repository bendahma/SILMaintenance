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
            'matricule' => $this->faker->randomNumber(NULL,false),
            'mark' => $this->faker->word,
            'matriel' => $this->faker->words(10),
            'machineType' => 'engin',
            'obs' => Str::random(100),
        ];
    }
}
