<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Employee::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $gender = $this->faker->randomElement(['male', 'female']);
        $status = $this->faker->randomElement(['single', 'married']);
        return [
            'nik' => $this->faker->randomDigit(),
            'full_name' => $this->faker->name($gender),
            'dob' => $this->faker->dateTimeBetween('1990-01-01', '2012-12-31')->format('Y-m-d'),
            'pob' => $this->faker->city(),
            'gender' => $gender,
            'status' => $status,
        ];
    }
}
