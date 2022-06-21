<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountryStateLocalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $file = __DIR__.'/sql/country_state_local.sql';
        DB::unprepared(file_get_contents($file));
        $this->command->info('Country, State and Local table seeded!');
    }
}
