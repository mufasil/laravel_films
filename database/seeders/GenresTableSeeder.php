<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Genre::truncate();

        $types = [
            [
                'name' => 'Crime',
            ],
            [
                'name' => 'Action',
            ],
            [
                'name' => 'Drama',
            ],
            [
                'name' => 'Adventure',
            ],
            [
                'name' => 'Fantasy',
            ],
            [
                'name' => 'Mystry',
            ]
        ];

        Genre::insert($types);
    }
}
