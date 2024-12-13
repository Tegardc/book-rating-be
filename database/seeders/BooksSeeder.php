<?php

namespace Database\Seeders;

use App\Models\Books;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $books = Books::factory()->count(100000)->make();
        $books->chunk(5000)->each(function ($chunk) {
            Books::insert($chunk->toArray());
        });
        //
    }
}
