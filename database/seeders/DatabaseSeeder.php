<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\Property;
use App\Models\PropertyImage;
use App\Models\RentalRequest;
use App\Models\Review;
use App\Models\Favorite;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->count(30)->has(
            Property::factory()->count(1)
                ->has(PropertyImage::factory()->count(1))
                ->has(RentalRequest::factory()->count(1))
                ->has(Review::factory()->count(1))
                ->has(Favorite::factory()->count(1))
        )->create();
        /*$this->call([
            UserSeeder::class,
            PropertySeeder::class,
            PropertyImageSeeder::class,
            RentalRequestSeeder::class,
            ReviewSeeder::class,
            FavoriteSeeder::class
        ]);*/
    }
}
