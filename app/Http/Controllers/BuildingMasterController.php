<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AAreaMasterModel;
use App\Models\BuildingDetailsModel;




class BuildingMasterController extends Controller
{
    public function showForm()
    {
        // $dropdownData = AAreaMasterModel::all();
        $dropdownData = AAreaMasterModel::where('delete_status', 1)->get();
        return view('Property.Building.building', ['dropdownData' => $dropdownData]);
    }
    public function store(Request $request)
    {
      
        $validatedData = $request->validate([
            'building_name' => 'required',
            'building_no' => ['required', 'regex:/^[a-zA-Z0-9\|\-\/\'\s]+$/'],
            'building_street' => 'required',
            'area_name' => 'required',
            'building_owner_name' => 'required',
            'building_owner_contact_number' => 'required|numeric',
            'no_of_contract_year' => 'required|numeric',
            'contract_year_from' => 'required|date',
            'contract_year_to' => 'required|date|after:contract_year_from',
            'number_of_rooms_in_building' => 'required|numeric',
            'eb_number' => 'required|numeric',
            'monthly_rent_of_building' => 'required|numeric',
            'advance_amount_for_building' => 'required|numeric',
            'due_in_advance_from_us_to_building_owner' => 'required|numeric',
            'building_contact_number' => 'required|numeric',
            "date_for_pay_rent_to_owner" => 'required|date'
        ]);
        
        $formEntry = BuildingDetailsModel::create([
            'building_name' => $validatedData['building_name'],
            'building_no' => $validatedData['building_no'],
            'building_street' => $validatedData['building_street'],
            'area_name' => $validatedData['area_name'],
            'building_owner_name' => $validatedData['building_owner_name'],
            'building_owner_contact_number' => $validatedData['building_owner_contact_number'],
            'no_of_contract_year' => $validatedData['no_of_contract_year'],
            'contract_year_from' => $validatedData['contract_year_from'],
            'contract_year_to' => $validatedData['contract_year_to'],
            'number_of_rooms_in_building' => $validatedData['number_of_rooms_in_building'],
            'eb_number' => $validatedData['eb_number'],
            'monthly_rent_of_building' => $validatedData['monthly_rent_of_building'],
            'advance_amount_for_building' => $validatedData['advance_amount_for_building'],
            'due_in_advance_from_us_to_building_owner' => $validatedData['due_in_advance_from_us_to_building_owner'],
            'building_contact_number' => $validatedData['building_contact_number'],
            'date_for_pay_rent_to_owner' =>$validatedData['date_for_pay_rent_to_owner'],
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

    public function fetchData()
    {
        // Fetch data from the database where delete_status is equal to 1, ordered by ID in descending order, using pagination
        $requests = BuildingDetailsModel::where('delete_status', 1)
            ->orderBy('id', 'desc')
            ->paginate(10);

        $dropdownData = AAreaMasterModel::all();    

        return view('Property.Building.building_master_view', compact('requests', 'dropdownData'));
    }
    public function viewData($id)
    {
        $request = BuildingDetailsModel::find($id);
        $dropdownData = AAreaMasterModel::all();

        return view('Property.Building.building_form_details_show', 
        [
            'request' => $request,
            "areaData" => $dropdownData
        ]
    
    );
    }

    public function updatedetails(Request $request, $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'building_name' => 'required',
            'building_no' => ['required', 'regex:/^[a-zA-Z0-9\|\-\/\'\s]+$/'],
            'building_street' => 'required',
            'area_name' => 'required',
            'building_owner_name' => 'required',
            'building_owner_contact_number' => 'required|numeric',
            'no_of_contract_year' => 'required|numeric',
            'contract_year_from' => 'required|date',
            'contract_year_to' => 'required|date|after:contract_year_from',
            'number_of_rooms_in_building' => 'required|numeric',
            'eb_number' => 'required|numeric',
            'monthly_rent_of_building' => 'required|numeric',
            'advance_amount_for_building' => 'required|numeric',
            'due_in_advance_from_us_to_building_owner' => 'required|numeric',
            'building_contact_number' => 'required|numeric',
            "date_for_pay_rent_to_owner" => 'required|date'
        ]);

        // Find the request by its ID
        $request = BuildingDetailsModel::findOrFail($id);

        $request->update([
            'building_name' => $validatedData['building_name'],
            'building_no' => $validatedData['building_no'],
            'building_street' => $validatedData['building_street'],
            'area_name' => $validatedData['area_name'],
            'building_owner_name' => $validatedData['building_owner_name'],
            'building_owner_contact_number' => $validatedData['building_owner_contact_number'],
            'no_of_contract_year' => $validatedData['no_of_contract_year'],
            'contract_year_from' => $validatedData['contract_year_from'],
            'contract_year_to' => $validatedData['contract_year_to'],
            'number_of_rooms_in_building' => $validatedData['number_of_rooms_in_building'],
            'eb_number' => $validatedData['eb_number'],
            'monthly_rent_of_building' => $validatedData['monthly_rent_of_building'],
            'advance_amount_for_building' => $validatedData['advance_amount_for_building'],
            'due_in_advance_from_us_to_building_owner' => $validatedData['due_in_advance_from_us_to_building_owner'],
            'building_contact_number' => $validatedData['building_contact_number'],
            'date_for_pay_rent_to_owner' =>$validatedData['date_for_pay_rent_to_owner'],
        ]);
        // Update the request with the validated data
       

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Request details updated successfully.');
    }
    public function deletedetails($id)
    {
        // Find the request by its ID
        $request = BuildingDetailsModel::findOrFail($id);
    
        // Update the status to "deleted" (or any other status you prefer)
        $request->update(['delete_status' => 0]);
    
        // Redirect back with a success message
        return redirect()->back()->with('success', 'Request status changed successfully.');
    }
    
}
