<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;
use Carbon\Carbon;


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
            [
                'title' => 'Harry Potter',
                'description' => 'A young wizard’s journey begins.',
                'price' => 50000,
                'stock' => 50,
                'cover_photo' => 'harry_potter.jpg',
                'genre_id' => 1,
                'author_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
              [
                'title' => '1984',
                'description' => 'A dystopian novel about totalitarianism.',
                'price' => 30000,
                'stock' => 30,
                'cover_photo' => '1984.jpg',
                'genre_id' => 2,
                'author_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Kafka on the Shore',
                'description' => 'A surreal coming-of-age novel.',
                'price' => 65000,
                'stock' => 20,
                'cover_photo' => 'kafka_on_the_shore.jpg',
                'genre_id' => 3,
                'author_id' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Hujan',
                'description' => 'A romantic and futuristic story.',
                'price' => 45000,
                'stock' => 40,
                'cover_photo' => 'hujan.jpg',
                'genre_id' => 4,
                'author_id' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Murder on the Orient Express',
                'description' => 'A detective story by Agatha Christie.',
                'price' => 55000,
                'stock' => 35,
                'cover_photo' => 'orient_express.jpg',
                'genre_id' => 5,
                'author_id' => 5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
