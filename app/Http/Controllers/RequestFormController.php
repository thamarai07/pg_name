<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RequestForm; // Import the RequestForm model
class RequestFormController extends Controller
{
    //
    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'form_request_category' => 'required',
            'form_request_filed_name.*' => 'required',
        ]);

        // Process the form submission, e.g., store data in the database

        // $fieldNames = json_encode($validatedData['form_request_filed_name']);
        // Create a new RequestForm instance and save it to the database
        $fieldNames = implode(',', $validatedData['form_request_filed_name']);
        $formEntry = RequestForm::create([
            'form_request_category' => $validatedData['form_request_category'],
            'form_request_field_name' => $fieldNames,
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
//     public function fetchData()
// {
//     // Fetch data from the database using the RequestForm model
//     $requests = RequestForm::all();

//     // Now $requests contains all the records from the RequestForm table
//     return $requests;
// }
public function fetchData()
{
    // Fetch data from the database where delete_status is equal to 1, ordered by ID in descending order, using pagination
    $requests = RequestForm::where('delete_status', 1)
                            ->orderBy('id', 'desc')
                            ->paginate(10);

    // Now $requests contains paginated records from the RequestForm table where delete_status is equal to 1
    return view('Request_form.request_form_view')->with('requests', $requests);
}


public function viewData($id)
{
    $request = RequestForm::find($id);
    return view('Request_form.request_form_details_show', ['request' => $request]);
}

public function updatedetails(Request $request, $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'form_request_category' => 'required|string|max:255',
            'form_request_field_name' => 'required|string|max:255',
        ]);

        // Find the request by its ID
        $request = RequestForm::findOrFail($id);

        // Update the request with the validated data
        $request->update([
            'form_request_category' => $validatedData['form_request_category'],
            'form_request_field_name' => $validatedData['form_request_field_name'],
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Request details updated successfully.');
    }

    public function deletedetails(Request $id)
    {
      
        // Validate the incoming request data
        $request = RequestForm::findOrFail($id['id']);

        // Update the status to "deleted" (or any other status you prefer)
        $request->update(['delete_status' => '0']);
    
        // Redirect back with a success message
        return redirect()->back()->with('success', 'Request status changed successfully.');
    }


}
