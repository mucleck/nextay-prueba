<?php

namespace Database\Seeders;

use App\Models\RoomType;
use Illuminate\Database\Seeder;

class RoomTypeSeeder extends Seeder
{
    public function run(): void
    {
        $roomTypes = [
            'Single',
            'Double',
            'Twin',
            'Triple',
            'Suite',
            'Deluxe',
            'Family',
            'Junior Suite',
            'Penthouse',
            'Presidential Suite',
        ];

        foreach ($roomTypes as $name) {
            RoomType::create([
                'name' => $name,
            ]);
        }
    }
}