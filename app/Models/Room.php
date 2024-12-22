<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    /** @use HasFactory<\Database\Factories\RoomFactory> */
    use HasFactory;

    protected $guarded = [''];
    protected $table = 'room';

    public function building()
    {
        return $this->belongsTo(Building::class, 'id_building');
    }
}
