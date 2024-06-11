<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            PropertySeeder::class,
            PropertyImageSeeder::class,
            RentalRequestSeeder::class,
            ReviewSeeder::class,
            FavoriteSeeder::class
        ]);
    }
}
