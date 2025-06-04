<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\Author;
use Carbon\Carbon;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Author::insert([
            [
                'name' => 'J.K. Rowling',
                'photo' => 'jk_rowling.jpg',
                'bio' => 'British author, best known for the Harry Potter series.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'George Orwell',
                'photo' => 'george_orwell.jpg',
                'bio' => 'English novelist, essayist, journalist and critic.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Haruki Murakami',
                'photo' => 'haruki_murakami.jpg',
                'bio' => 'Japanese writer known for his surreal and unique narratives.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Tere Liye',
                'photo' => 'tere_liye.jpg',
                'bio' => 'Indonesian novelist known for youth and romance literature.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Agatha Christie',
                'photo' => 'agatha_christie.jpg',
                'bio' => 'English writer known for her detective novels.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
}
}