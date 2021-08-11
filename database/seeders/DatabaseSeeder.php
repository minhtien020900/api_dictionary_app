<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(WordSeeder::class);
        $this->call(PartsOfSpeechSeeder::class);
        $this->call(WordPartsOfSpeechSeeder::class);
        $this->call(TopicSeeder::class);
    }
}
