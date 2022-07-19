<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Student::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'Name'              => $this->faker->firstName,
            'Surname'           => $this->faker->lastName,
            'IndentificationNo' => $this->faker->numerify('ST-#####'),
            'Country'           => $this->faker->country,
            'DateOfBirth'       => $this->faker->date,
            'RegisteredOn'      => $this->faker->dateTime,
        ];
    }
}
