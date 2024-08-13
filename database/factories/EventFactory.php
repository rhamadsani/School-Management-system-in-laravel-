<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\User;
use App\School;

class EventFactory extends Factory
{
    public function definition(): array
    {
        return [
            'file_path'   => fake()->url,
            'title'       => fake()->sentences(1, true),
            'description' => fake()->sentences(3, true),
            'active'      => fake()->randomElement([0, 1]),
            'school_id'   => fake()->randomElement(School::pluck('id')->toArray()),
            'user_id'     => function() {
                if (User::count())
                    return fake()->randomElement(User::pluck('id')->toArray());
                else return User::factory(1)->create()->id;
            },
        ];
    }
}
