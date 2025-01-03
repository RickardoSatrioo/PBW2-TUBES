<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    /** @use HasFactory<\Database\Factories\BuildingFactory> */
    use HasFactory;

    protected $table = 'building';
    protected $guarded = [''];

    // protected $searchable = [
    //     'columns' => [
    //         'name' => 10,
    //         'description' => 5,
    //     ],
    //     'joins' => [
    //         'room' => ['building.id','room.room_id'],
    //     ],
    // ];

    public function room()
    {
        return $this->hasMany(Room::class, 'id_building');
    }

}
