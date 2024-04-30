<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BuildingDetailsModel;


class RoomsController extends Controller
{
    public function showForm()
    {
        $buildings = BuildingDetailsModel::where('delete_status', 1)->get();
        return view('Property.Rooms.room', ['buildings' => $buildings]);
    }
}
