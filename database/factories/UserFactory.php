<?php

namespace Database\Factories;

use App\Models\Organization;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'username' => "06" . rand(00000000,999999999),
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'mobile' => 0 . rand(9150000000,9159999999),
            'status' => 1,
            'email' => $this->faker->unique()->safeEmail(),
            'organization_id' => Organization::inRandomOrder()->first()->id,  
            'email_verified_at' => now(),
            'password' => '$2y$10$RFOsxDuhkPA4nX7S8zVUmezu9zWhGCa4e9Ggrmwb/V7/L4bCPHq2e', // adminadmin
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
