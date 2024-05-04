<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roomsmodel extends Model
{
    use HasFactory;
   
       
      /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'building_name',
        'room_number',
        'slot_number' ,
        'advance_amount_for_the_slot' ,
        'rent_for_the_slot' ,
        'occupied_status',
        'eb_number_of_the_slot',
        'area',
    ];
}
