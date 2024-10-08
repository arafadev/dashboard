<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => 'User' . ' ' . Str::random(10),
            'username' => 'user' . rand(1,10),
            'email' => Str::random(10) . '@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('user'),
            'phone' => fake()->phoneNumber,
            'address' => fake()->address(),
            'status' =>fake()->randomElement(User::$status),
            'photo' => 'upload/no_image.jpg',
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
