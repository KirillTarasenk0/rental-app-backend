<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PropertyImage;

class PropertyImageSeeder extends Seeder
{
    public function run(): void
    {
        PropertyImage::factory()->count(20)->create();
    }
}
