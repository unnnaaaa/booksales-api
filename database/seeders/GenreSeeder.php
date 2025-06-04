<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
         DB::table('genres')->insert([
            [
                'name' => 'Fantasy',
                'description' => 'Genre yang berisi elemen magis dan dunia imajinatif.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Dystopian',
                'description' => 'Menceritakan masa depan yang suram dan penuh kontrol.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Magical Realism',
                'description' => 'Menggabungkan realitas dengan unsur-unsur magis.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Romance',
                'description' => 'Fokus pada hubungan cinta dan emosi antar tokoh.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Mystery',
                'description' => 'Mengandung misteri dan teka-teki yang menantang.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
