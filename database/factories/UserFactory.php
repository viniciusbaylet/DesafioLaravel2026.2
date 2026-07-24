<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
            'type' => 'user',
            'cep' => '00000-000',
            'address' => fake()->streetAddress(),
            'neighborhood' => 'Centro',
            'city' => fake()->city(),
            'state' => 'SP',
            'number' => '123',
            'complement' => null,
            'phone' => '(11) 99999-9999',
            'birth_date' => '1990-01-01',
            'cpf' => fake()->unique()->numerify('###.###.###-##'),
            'balance' => 0.00,
        ];
    }

    /**
     * Indicate that a user is a admin
    */
    public function admin(): static
    {
        return $this->state(fn (array $attributes) => [
            'type' => 'admin',
        ]);
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
