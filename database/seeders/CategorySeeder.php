<?php

namespace Database\Seeders;

use App\Models\CategoryBooks;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category = CategoryBooks::factory()->count(3000)->make();
        $category->chunk(1000)->each(function ($chunk) {
            CategoryBooks::insert($chunk->toArray());
        });
        //
    }
}
