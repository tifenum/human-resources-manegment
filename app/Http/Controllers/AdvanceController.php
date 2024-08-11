<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Advance;
use Illuminate\Support\Facades\Log; // Correct import for Log
use Brian2694\Toastr\Facades\Toastr;

class AdvanceController extends Controller
{
    public function create()
    {
        return view('settings.advancedemand'); // Update with your view name
    }

    public function store(Request $request)
    {
        try {
            // Validate the request data
            $request->validate([
                'amount' => 'required|numeric',
                'date_wish' => 'required|string', // Validate as string
                'department' => 'required|string',
                'description' => 'nullable|string',
            ]);
            
            // Convert date_wish from DD-MM-YYYY to YYYY-MM-DD
            $dateWish = \DateTime::createFromFormat('d-m-Y', $request->input('date_wish'));
            $formattedDateWish = $dateWish ? $dateWish->format('Y-m-d') : null;
    
            // Create a new advance record
            Advance::create([
                'user_id' => $request->input('user_id'),
                'amount' => $request->input('amount'),
                'date_wish' => $formattedDateWish,
                'department' => $request->input('department'),
                'description' => $request->input('description'),
                'chief_staff_status' => false, // Default values
                'head_department_status' => false,
                'financial_director_status' => false,
                'manager_director_status' => false,
                'accepted' => false,
            ]);
    
            Toastr::success('Advance demand submitted successfully :)','Success');
            return redirect()->route('advance.index')->with('success', 'Advance demand submitted successfully :)');
    
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Validation error: ' . json_encode($e->errors())); // Log validation errors
            Toastr::error('Error :(','Error');
            return redirect()->route('advance.index')->with('error', 'Failed to submit advance demand.');
        } catch (\Exception $e) {
            Log::error('General error: ' . $e->getMessage()); // Log general errors
            Toastr::error('Error :(','Error');
            return redirect()->route('advance.index')->with('error', 'Failed to submit advance demand.');
        }
    }
    public function destroy($id)
    {
        try {
            // Find the advance record by ID
            $advance = Advance::findOrFail($id);
            
            // Delete the record
            $advance->delete();

            Toastr::success('Advance demand deleted successfully :)', 'Success');
            return redirect()->route('advance.index')->with('success', 'Advance demand deleted successfully :)');
        } catch (\Exception $e) {
            Log::error('Delete error: ' . $e->getMessage()); // Log errors
            Toastr::error('Error :(', 'Error');
            return redirect()->route('advance.index')->with('error', 'Failed to delete advance demand.');
        }
    }
    public function index()
    {
        $advances = Advance::all();
        return view('form.allemployeecard', compact('advances')); // Replace 'advances.index' with your actual view path
    }
    public function edit($id)
{
    $advance = Advance::findOrFail($id);
    return response()->json($advance);
}

public function update(Request $request, $id)
{
    try {
        Log::info('Updating advance with ID: ' . $id);

        // Validate the request data
        $request->validate([
            'amount' => 'nullable|numeric',
            'date_wish' => 'nullable|string', // Adjust according to your format
            'department' => 'nullable|string',
            'description' => 'nullable|string',
            // Add validation for other fields if needed
        ]);

        // Find the advance record
        $advance = Advance::findOrFail($id);

        // Update only the provided fields, keeping old values for others
        $advance->update([
            'amount' => $request->input('amount', $advance->amount),
            'date_wish' => $request->input('date_wish', $advance->date_wish),
            'department' => $request->input('department', $advance->department),
            'description' => $request->input('description', $advance->description),
            'chief_staff_status' => $request->input('chief_staff_status', $advance->chief_staff_status),
            'head_department_status' => $request->input('head_department_status', $advance->head_department_status),
            'financial_director_status' => $request->input('financial_director_status', $advance->financial_director_status),
            'manager_director_status' => $request->input('manager_director_status', $advance->manager_director_status),
            'accepted' => $request->input('accepted', $advance->accepted),
        ]);

        Toastr::success('Advance demand updated successfully :)', 'Success');
        return redirect()->route('advance.index')->with('success', 'Advance demand updated successfully :)');

    } catch (\Illuminate\Validation\ValidationException $e) {
        Log::error('Validation error: ' . json_encode($e->errors())); // Log validation errors
        Toastr::error('Validation error :(', 'Error');
        return redirect()->back()->withErrors($e->errors())->withInput();
    } catch (\Exception $e) {
        Log::error('Update error: ' . $e->getMessage()); // Log general errors
        Toastr::error('Update error :(', 'Error');
        return redirect()->back()->with('error', 'Failed to update advance demand.');
    }
}


    public function updateStatus(Request $request, Advance $advance)
    {
        // Check user role and update the respective status
        $userRole = auth()->user()->role_name;
        $status = $request->input('status') === 'approve';

        Log::info('User role:', ['role' => $userRole]);
        Log::info('Status:', ['status' => $status]);

        switch ($userRole) {
            case 'Chief of staff':
                $advance->chief_staff_status = $status;
                Log::info('Updating chief_staff_status', ['status' => $status]);
                break;
            case 'Head of department':
                $advance->head_department_status = $status;
                Log::info('Updating head_department_status', ['status' => $status]);
                break;
            case 'Financial director':
                $advance->financial_director_status = $status;
                Log::info('Updating financial_director_status', ['status' => $status]);
                break;
            case 'Manager director':
                $advance->manager_director_status = $status;
                Log::info('Updating manager_director_status', ['status' => $status]);
                break;
        }

        // Optionally, set 'accepted' status if all other statuses are approved
        if ($advance->chief_staff_status && $advance->head_department_status && $advance->financial_director_status || $advance->manager_director_status) {
            $advance->accepted = true;
            Log::info('All statuses approved. Setting accepted to true');
        } else {
            $advance->accepted = false;
            Log::info('Not all statuses approved. Setting accepted to false');
        }

        $advance->save();
        Log::info('Advance status saved', ['advance' => $advance]);
        Toastr::success('Advance demand submitted successfully :)','Success');

        return redirect()->back()->with('status', 'Advance status updated successfully');
    }
}
