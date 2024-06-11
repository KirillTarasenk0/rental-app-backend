<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\RentalRequest;

class RentalRequestSeeder extends Seeder
{
    public function run(): void
    {
        RentalRequest::factory()->count(10)->create();
    }
}
