<?php

namespace Database\Seeders;

use App\Models\RoomType;
use App\Models\Rate;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            RoomTypeSeeder::class,
            RateSeeder::class,
        ]);
    }
}