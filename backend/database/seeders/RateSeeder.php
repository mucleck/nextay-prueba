<?php

namespace Database\Seeders;

use App\Models\Rate;
use App\Models\RoomType;
use Illuminate\Database\Seeder;

class RateSeeder extends Seeder
{
    public function run(): void
    {
        $roomTypeIds = RoomType::pluck('id')->all();

        $totalRates = 5_000_000;
        $chunkSize = 10_000;

        for ($i = 0; $i < $totalRates; $i += $chunkSize) {
            $rows = [];

            $count = min($chunkSize, $totalRates - $i);

            for ($j = 0; $j < $count; $j++) {
                $rows[] = [
                    'room_type_id' => fake()->randomElement($roomTypeIds),
                    'price' => fake()->randomFloat(2, 50, 300),
                    'valid_from' => fake()
                        ->dateTimeBetween('-2 years', 'now')
                        ->format('Y-m-d'),
                ];
            }

            Rate::insert($rows);
            echo "Inserted: {$i}\n";
        }
    }
}