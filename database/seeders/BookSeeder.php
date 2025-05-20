<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Book::insert([
            ['title' => 'Harry Potter', 'author_id' => 1, 'year' => 1997],
            ['title' => '1984', 'author_id' => 2, 'year' => 1949],
            ['title' => 'Kafka on the Shore', 'author_id' => 3, 'year' => 2002],
            ['title' => 'Hujan', 'author_id' => 4, 'year' => 2016],
            ['title' => 'Murder on the Orient Express', 'author_id' => 5, 'year' => 1934],
        ]);
    }
}
