<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Credential>
 */
class CredentialFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'        => fake()->name,
            'note'         => fake()->text(125),

            'login'        => fake()->userName(),
            'password'     => fake()->password(),

            'link'         => fake()->url(),
            'image'        => fake()->filePath(),

            'repertory_id' => fake()->numberBetween(1,8),
        ];
    }
}
