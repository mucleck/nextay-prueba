<?php

namespace App\Queries;

use Illuminate\Support\Facades\DB;

class RoomInfoQuery
{
    public function getCountAverage()
    {
        return DB::select('
            SELECT
                rt.name,
                COALESCE(r.stats_count, 0) AS rates_count,
                r.avg_price AS rates_avg_price
            FROM room_types rt
            LEFT JOIN (
                SELECT
                    room_type_id,
                    COUNT(*) AS stats_count,
                    AVG(price) AS avg_price
                FROM rates
                GROUP BY room_type_id
            ) r ON r.room_type_id = rt.id
        ');
    }

    public function getLastPrice()
    {
        return DB::select('
            WITH latest_dates AS (
                SELECT
                    room_type_id,
                    MAX(valid_from) AS valid_from
                FROM rates
                GROUP BY room_type_id
            ),
            latest_ids AS (
                SELECT
                    r.room_type_id,
                    r.valid_from,
                    MAX(r.id) AS id
                FROM rates r
                JOIN latest_dates ld
                    ON ld.room_type_id = r.room_type_id
                    AND ld.valid_from = r.valid_from
                GROUP BY r.room_type_id, r.valid_from
            )
            SELECT
                rt.name,
                r.valid_from,
                r.price
            FROM room_types rt
            LEFT JOIN latest_ids li
                ON li.room_type_id = rt.id
            LEFT JOIN rates r
                ON r.id = li.id
        ');
    }
}