<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Rate extends Model
{
    /** @use HasFactory<\Database\Factories\RateFactory> */
    use HasFactory;

    //Campos que permitimos asignar 
    protected $fillable = [
        'room_type_id',
        'price',
        'valid_from',
    ];

    //Casteo el numero a decimal para que quede claro en el codigo
    protected $casts = [
        'price' => 'decimal:2',
        'valid_from' => 'date',
    ];

    public function roomType(): BelongsTo
    {
        return $this->belongsTo(RoomType::class);
    }
}
