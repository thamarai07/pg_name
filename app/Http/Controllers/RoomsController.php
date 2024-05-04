<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BuildingDetailsModel;
use App\Models\Roomsmodel;
use App\Models\AAreaMasterModel;



class RoomsController extends Controller
{
    public function showForm()
    {
        $buildings = BuildingDetailsModel::where('delete_status', 1)->get();
        $area = AAreaMasterModel::where('delete_status', 1)->get();

        return view('Property.Rooms.room', ['buildings' => $buildings, "area"=>$area ] );
    }

    public function store(Request $request)
    {
     
      
        $validatedData = $request->validate([
            'building_name' => 'required',
            'room_number' => 'required',
            'slot_number' => 'required',
            'advance_amount_for_the_slot' => 'required',
            'rent_for_the_slot' => 'required',
            'occupied_status' => 'required',
            'eb_number_of_the_slot' => 'required',
            'area' => "required",
        ]);
        
        $formEntry = Roomsmodel::create([
            'building_name' => $validatedData['building_name'],
            'room_number' => $validatedData['room_number'],
            'slot_number' => $validatedData['slot_number'],
            'advance_amount_for_the_slot' => $validatedData['advance_amount_for_the_slot'],
            'rent_for_the_slot' => $validatedData['rent_for_the_slot'],
            'occupied_status' => $validatedData['occupied_status'],
            'eb_number_of_the_slot' => $validatedData['eb_number_of_the_slot'],
            'area' =>$validatedData['area'],
           
        ]);

        // Check if data was successfully inserted
        if ($formEntry) {
            // Data inserted successfully, set success message
            return redirect()->back()->with('success', 'Form submitted successfully!');
        } else {
            // Data insertion failed, set error message
            return redirect()->back()->with('error', 'Failed to submit form. Please try again.');
        }
    }

    public function room_and_slot_details_of_the_building(Request $request){
        $buildingId = $request->input('buildingId');
        $response = Roomsmodel::where("building_name" ,$buildingId)->get();
        if($response->isEmpty()) {
            // No rooms found for the given building ID
            return response()->json(['message' => 'No rooms found for the given building ID'], 404);
        }
        
        // Return the rooms data
        return response()->json(['rooms' => $response]);
        
    }

    public function fetchData() {
        $requests = Roomsmodel::where('delete_status', 1)
                    ->orderBy('id', 'desc')
                    ->paginate(10);
        $buildings = BuildingDetailsModel::where('delete_status', 1)->get();
    
        // Return an array with both values
        return view('Property.Rooms.room_master_view', [
            'requests' => $requests,
            'buildings' => $buildings
        ]);
    }

    public function viewData($id)
    {
        $request = Roomsmodel::find($id);
        return view('Property.Rooms.room_form_details_show', ['request' => $request]);
    }
    

}
