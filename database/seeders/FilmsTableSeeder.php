<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Film;
use Illuminate\Database\Seeder;

class FilmsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Film::truncate();
        Comment::truncate();
        $films = [
            [
                "film" => [
                    "name" => "Gran Turismo",
                    "slug" => "gran-turismo",
                    "description" => "Based on the unbelievable, inspiring true story of a team of underdogs - a struggling, working-class gamer, a failed former race car driver, and an idealistic motorsport exec - who risk it all to take on the most elite sport in the world.",
                    "release_date" => "2023-08-9",
                    "rating" => 5,
                    "ticket_price" => 500,
                    "country_code" => "PK",
                    "photo" => "https://m.media-amazon.com/images/M/MV5BMTI1YjFmN2UtOWZhOC00MjkwLTg2ZjgtNDQ5NDQ3YWNmNGRkXkEyXkFqcGdeQXVyMTAxNzQ1NzI@._V1_QL75_UX190_CR0,0,190,281_.jpg",
                ],
                "comments" => [
                    new Comment([
                        "name" => "Mufasil",
                        "comment" => "Nice Films",
                        "user_id" => 1
                    ])
                ]
            ],
            [
                "film" => [
                    "name" => "Haunted Mansion",
                    "slug" => "haunted-mansion",
                    "description" => "A single mom named Gabbie hires a tour guide, a psychic, a priest and a historian to help exorcise her newly bought mansion after discovering it is inhabited by ghosts.",
                    "release_date" => "2023-08-11",
                    "rating" => 4,
                    "ticket_price" => 500,
                    "country_code" => "PK",
                    "photo" => "https://m.media-amazon.com/images/M/MV5BNTlmZmFkYTEtMDM4NS00NTgzLWFhODEtZjMxOTlmN2QxZTdiXkEyXkFqcGdeQXVyMTMzOTQyOTk1._V1_QL75_UX190_CR0,0,190,281_.jpg",
                ],
                "comments" => [
                    new Comment([
                        "name" => "Mufasil",
                        "comment" => "Nice Films",
                        "user_id" => 1
                    ])
                ]
            ],
            [
                "film" => [
                    "name" => "Gadar 2",
                    "slug" => "gadar-2",
                    "description" => "India's most loved family of Tara, Sakeena and Jeete; 22 years after its predecessor. Set against the Indo-Pakistan war of 1971, Tara Singh, once again, will face every enemy to protect the honor of country and family.",
                    "release_date" => "2023-08-11",
                    "rating" => 4,
                    "ticket_price" => 500,
                    "country_code" => "PK",
                    "photo" => "https://m.media-amazon.com/images/M/MV5BZGEzMDJjNGUtYTFhZi00MDgyLWIzMzYtMzcwMDQyZjcyNGY1XkEyXkFqcGdeQXVyNTcwNTM5ODI@._V1_QL75_UY281_CR11,0,190,281_.jpg",
                ],
                "comments" => [
                    new Comment([
                        "name" => "Mufasil",
                        "comment" => "Nice Films",
                        "user_id" => 1
                    ])
                ]
            ]
        ];
        foreach ($films as $item) {
            $film = Film::create($item['film']);
            if ($film) {
                $film->comments()->saveMany($item['comments']);
            }
        }
    }
}
