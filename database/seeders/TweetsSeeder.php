<?php

namespace Database\Seeders;

use App\Models\Image;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tweet;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TweetsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tweet::factory()->count(3)->create()->each(
            fn ($tweet) =>
            Image::factory()->count(4)->create()->each(
                fn ($image) =>
                $tweet->images()->attach($image->id)
            )
        );
    }
}
