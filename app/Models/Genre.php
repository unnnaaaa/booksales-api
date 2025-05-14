<?php

namespace App\Models;

class Genre
{
    public static function getAll()
    {
        return [
            ['id' => 1, 'name' => 'Fiction'],
            ['id' => 2, 'name' => 'Non-fiction'],
            ['id' => 3, 'name' => 'Science'],
            ['id' => 4, 'name' => 'Biography'],
            ['id' => 5, 'name' => 'Fantasy'],
        ];
    }
}
