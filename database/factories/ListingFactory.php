<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Listing>
 */
class ListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $title = $this->faker->sentence(rand(5, 7));
        $datetime = $this->faker->dateTimeBetween('-1 month', 'now');


        return [
            'user_id' => rand(1, 10),
            'title' => $title,
            'slug' => Str::slug($title) . '-' . rand(1111, 9999),
            'company' => $this->faker->company,
            'location' => $this->faker->address,
            'logo' => basename($this->faker->image(storage_path('app/public'))),
            'is_highlighted' => (rand(1, 9) > 7),
            'is_active' => true,
            'content' => $this->faker->sentences(rand(5, 10), true),
            'apply_link' => $this->faker->url,
            'created_at' => $datetime,
            'updated_at' => $datetime
        ];
    }
}
