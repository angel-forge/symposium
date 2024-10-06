<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Conference>
 */
class ConferenceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $startsAt = now()->addMonths(rand(1, 12));
        $endsAt = $startsAt->copy()->addDays(rand(1, 7));
        $cfpStartsAt = $startsAt->copy()->subMonths(rand(2, 3));
        $cfpEndsAt = $cfpStartsAt->copy()->addMonths(1);

        return [
            'title' => $this->faker->sentence(),
            'location' => $this->faker->city() . ', ' . $this->faker->country(),
            'description' => $this->faker->paragraph(),
            'url' => $this->faker->url(),
            'starts_at' => $startsAt,
            'ends_at' => $endsAt,
            'cfp_starts_at' => $cfpStartsAt,
            'cfp_ends_at' => $cfpEndsAt,
        ];
    }
}
