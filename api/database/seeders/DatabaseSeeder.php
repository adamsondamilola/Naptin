<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $path = 'database/seeders/sql/country_state_local.sql';
        DB::unprepared(file_get_contents($path));
        $this->command->info('Country, State and Local table seeded!');
    }
}
