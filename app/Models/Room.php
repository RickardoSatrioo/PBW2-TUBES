<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Room extends Model
{
    /** @use HasFactory<\Database\Factories\RoomFactory> */
    use HasFactory, SearchableTrait;

    protected $guarded = [''];
    protected $table = 'room';

    protected $searchable = [
        'columns' => [
            'room.name' => 10,
            'room.capacity' => 5,
            'building.name' => 5,
        ],
        'joins' => [
            'building' => ['room.id_building','room.id'],
        ],
    ];

    public function building()
    {
        return $this->belongsTo(Building::class, 'id_building');
    }
}
