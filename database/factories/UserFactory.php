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
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama'          => fake()->name(), // Randomly generated name, could be replaced with a specific pattern if needed.
            'jenis_kelamin' => fake()->randomElement(['Perempuan', 'Laki-laki']), // Randomly choose gender
            'no_telepon'    => fake()->phoneNumber(),
            'alamat'        => fake()->address(),
            'status'        => 'USER',
            'aktif'         => 'y',
            'username'      => fake()->unique()->userName(),
            'email'         => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password'      => Hash::make('password'), // Use a default password, hashed.
            'gambar'        => 'gambar_user/user2.png', // Default image path.
            'divisi_id'     => fake()->numberBetween(1, 10),
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
