<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $author = Author::factory()->count(1000)->make();
        $author->chunk(500)->each(function ($chunk) {
            Author::insert($chunk->toArray());
        });
        //
    }
}
