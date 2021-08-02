<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class PartsOfSpeechSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('parts_of_speeches')->insert([
            [
                "id" => 1,
                "name" => "noun",
                "acronym" => "n"
            ],
            [
                "id" => 2,
                "name" => "verb",
                "acronym" => "v"
            ],
            [
                "id" => 3,
                "name" => "adjective",
                "acronym" => "adj"
            ],
            [
                "id" => 4,
                "name" => "adverb",
                "acronym" => "adv"
            ],
            [
                "id" => 5,
                "name" => "preposition",
                "acronym" => "prep"
            ],
            [
                "id" => 6,
                "name" => "pronoun",
                "acronym" => "pro"
            ],
            [
                "id" => 7,
                "name" => "conjunction",
                "acronym" => ""
            ],
            [
                "id" => 8,
                "name" => "interjections",
                "acronym" => ""
            ],
        ]);
    }
}
