<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AAreaMasterModel; // Import the RequestForm model

class AreaMasterController extends Controller
{

    // 'area_name',
    // 'area_pincode',
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'area_name' => 'required',
            'area_pincode' => 'required|numeric',
        ]);

        $formEntry = AAreaMasterModel::create([
            'area_name' => $validatedData['area_name'],
            'area_pincode' => $validatedData['area_pincode'],
            'area_code' => strtoupper($validatedData['area_name'] . $validatedData['area_pincode']),

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
        $requests = AAreaMasterModel::where('delete_status', 1)
            ->orderBy('id', 'desc')
            ->paginate(10);

        // Now $requests contains paginated records from the RequestForm table where delete_status is equal to 1
        return view('Property.Area.area_master_view')->with('requests', $requests);
    }

    public function viewData($id)
    {
        $request = AAreaMasterModel::find($id);
        return view('Property.Area.area_form_details_show', ['request' => $request]);
    }
    public function updatedetails(Request $request, $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'area_name' => 'required|string|max:255',
            'area_pincode' => 'required|string|max:255',
        ]);

        // Find the request by its ID
        $request = AAreaMasterModel::findOrFail($id);

        // Update the request with the validated data
        $request->update([
            'area_name' => $validatedData['area_name'],
            'area_pincode' => $validatedData['area_pincode'],
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Request details updated successfully.');
    }
    public function deletedetails(Request $id)
    {
      
        // Validate the incoming request data
        $request = AAreaMasterModel::findOrFail($id['id']);

        // Update the status to "deleted" (or any other status you prefer)
        $request->update(['delete_status' => '0']);
    
        // Redirect back with a success message
        return redirect()->back()->with('success', 'Request status changed successfully.');
    }
}
