<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Owner;
use App\Models\User;
use App\Models\Car;

class OwnerFactory extends Factory
{
    protected $model = Owner::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(), // Create a new user for each owner
            'name' => $this->faker->firstName(),
            'surname' => $this->faker->lastName(),
            'year' => $this->faker->numberBetween(1945, 2003)
        ];
    }

    public function hasCars($count = null)
    {
        return $this->afterCreating(function (Owner $owner) use ($count) {
            $owner->cars()->saveMany(Car::factory()->count($count ?? rand(1, 3))->make());
        });
    }
}
