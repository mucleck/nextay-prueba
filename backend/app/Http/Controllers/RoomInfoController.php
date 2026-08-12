<?php

namespace App\Http\Controllers;

use App\Queries\RoomInfoQuery;
use Illuminate\Http\Request;


class RoomInfoController extends Controller
{

    public function __construct(
        private RoomInfoQuery $roomInfoQuery
    ) {}

    /**
     * Devuelve un array asociado en con el nombre, el numero y el precio medio de cada roomtype
     */
    public function getCountAverage()
    {
        $roomTypes = $this->roomInfoQuery->getCountAverage();

        return response()->json($roomTypes);
    }

    /**
     * Devuelve por cada tipo de habitacion el ultimo precio 
     */

    public function getLastPrice()
    {
        $roomTypes = $this->roomInfoQuery->getLastPrice();

        return response()->json($roomTypes);
    }
}
