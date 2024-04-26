<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AAreaMasterModel;


class BuildingMasterController extends Controller
{
    public function showForm()
    {
        $dropdownData = AAreaMasterModel::all();
        return view('Property.Building.building', ['dropdownData' => $dropdownData]);
    }
}
