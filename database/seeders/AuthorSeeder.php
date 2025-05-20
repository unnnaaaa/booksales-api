<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\Author;

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
            ['name' => 'J.K. Rowling', 'country' => 'UK'],
            ['name' => 'George Orwell', 'country' => 'UK'],
            ['name' => 'Haruki Murakami', 'country' => 'Japan'],
            ['name' => 'Tere Liye', 'country' => 'Indonesia'],
            ['name' => 'Agatha Christie', 'country' => 'UK'],
        ]);
}
}