<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class RoomType extends Model
{
    /** @use HasFactory<\Database\Factories\RoomTypesFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function rates(): HasMany
    {
        return $this->hasMany(Rate::class);
    }

    public function latestRate()
    {
        return $this->hasOne(Rate::class)
            ->latestOfMany('valid_from');
    }
}
