<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RequestForm; 
use App\Models\AAreaMasterModel;
class DropDownController extends Controller
{
    public function AreaForBuilding()
    {
        $dropdownData = AAreaMasterModel::all();
        return view('Property.Building.building', ['dropdownData' => $dropdownData]);
    }
}
