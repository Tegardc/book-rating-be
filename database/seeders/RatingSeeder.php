<?php

namespace Database\Seeders;

use App\Models\Rating;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ini_set('memory_limit', '1000M');
        $rating = Rating::factory()->count(500000)->make();
        $rating->chunk(1000)->each(function ($chunk) {
            Rating::insert($chunk->toArray());
        });
        //
    }
}
