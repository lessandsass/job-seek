<?php

namespace Database\Seeders;

use App\Models\Listing;
use App\Models\Tag;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
//         User::factory(10)->create();

//        Tag::factory(10)->create();

//        Listing::factory(10)->create();

//        User::factory()->create([
//            'name' => 'Test User',
//            'email' => 'test@example.com',
//        ]);

        $tags = Tag::factory(10)->create();

        User::factory(20)->create()->each(function ($user) use ($tags) {
            Listing::factory(rand(1, 4))->create(['user_id' => $user->id]);
        })->each(function ($listing) use ($tags) {
            $listing->tags()->attach($tags->random(2));
        });

    }
}
