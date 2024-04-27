<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuildingDetailsModel extends Model
{
    use HasFactory;
   
       
      /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'building_name',
        'building_no',
        'building_street' ,
        'area_name' ,
        'building_owner_name' ,
        'building_owner_contact_number',
        'no_of_contract_year',
        'contract_year_from',
        'contract_year_to',
        'number_of_rooms_in_building',
        'eb_number',
        'monthly_rent_of_building',
        'advance_amount_for_building',
        'due_in_advance_from_us_to_building_owner',
        'building_contact_number',
        'date_for_pay_rent_to_owner',
    ];
 
}
