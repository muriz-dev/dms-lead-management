<?php

namespace Database\Factories;

use App\Enums\LeadStatus;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class LeadFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'phone' => fake()->phoneNumber(),
            'company' => fake()->company(),
            'message' => fake()->paragraph(),
            'status' => fake()->randomElement(LeadStatus::cases()),
            'source' => fake()->randomElement(['Website', 'Referral', 'LinkedIn', 'Cold Call', 'Email Campaign']),
            'assigned_to' => fake()->boolean(70) ? User::inRandomOrder()->first()?->id : null,
            'notes' => fake()->boolean(50) ? fake()->sentence() : null,
        ];
    }
}