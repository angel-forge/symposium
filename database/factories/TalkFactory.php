<?php

namespace Database\Factories;

use App\Enums\TalkType;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Talk>
 */
class TalkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'title' => $this->faker->sentence(),
            'type' => $this->faker->randomElement(TalkType::cases())->value,
            'length' => $this->faker->numberBetween(1, 100),
            'abstract' => $this->faker->paragraph(),
            'organizer_notes' => $this->faker->paragraph(),
        ];
    }
}
