<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Holiday;
use Illuminate\Support\Facades\Log;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class HolidayController extends Controller
{
// In HolidayController.php
public function create()
{
    return view('settings.holidaydemand');
}


public function store(Request $request)
{
    Log::info('Store method entered.');
    Log::info('Submitted Data:', $request->all());

    $request->validate([
        'type' => 'nullable|string|max:255',
        'from_date' => 'required|string|date_format:d-m-Y', // Adjust format
        'to_date' => 'required|string|date_format:d-m-Y',   // Adjust format
        'reason' => 'nullable|string',
    ]);

    try {
        $fromDate = Carbon::createFromFormat('d-m-Y', $request->input('from_date'))->format('Y-m-d');
        $toDate = Carbon::createFromFormat('d-m-Y', $request->input('to_date'))->format('Y-m-d');

        $fromDate = new \DateTime($request->from_date);
        $toDate = new \DateTime($request->to_date);
        $interval = $fromDate->diff($toDate);
        $numberOfDays = $interval->days + 1;

        Log::info('Creating Holiday object.');
        $holiday = new Holiday([
            'user_id' => $request->user_id,
            'type' => $request->type,
            'from_date' => $fromDate->format('Y-m-d'),
            'to_date' => $toDate->format('Y-m-d'),
            'number_of_days' => $numberOfDays,
            'reason' => $request->reason,
            'status_MD' => false,
            'status_HD' => false,
            'status_FD' => false,
            'status_Ch5' => false,
            'confirmed' => false,
        ]);

        $holiday->save();
        Log::info('Holiday object saved.');

        Toastr::success('Holiday request submitted successfully.', 'Success');
        return redirect()->route('holiday.index')->with('success', 'Holiday request submitted successfully.');
    } catch (\Illuminate\Validation\ValidationException $e) {
        Log::error('Validation error: ' . json_encode($e->errors())); // Log validation errors
        Toastr::error('Validation error: ' . $e->getMessage(), 'Error');
        return redirect()->route('holiday.index')->with('error', 'Failed to submit holiday request.');
    } catch (\Exception $e) {
        Log::error('General error: ' . $e->getMessage()); // Log general errors
        Toastr::error('Error: ' . $e->getMessage(), 'Error');
        return redirect()->route('holiday.index')->with('error', 'Failed to submit holiday request.');
    }
}


public function updateStatus(Request $request, $id)
{
    // Find the holiday record by ID
    $holiday = Holiday::findOrFail($id);

    // Check user role and update the respective status
    $userRole = auth()->user()->role_name;
    $status = $request->input('status') === 'approve';

    Log::info('User role:', ['role' => $userRole]);
    Log::info('Status:', ['status' => $status]);

    switch ($userRole) {
        case 'Chief of staff':
            $holiday->status_Ch5 = $status;
            Log::info('Updating status_Ch5', ['status' => $status]);
            break;
        case 'Head of department':
            $holiday->status_HD = $status;
            Log::info('Updating status_HD', ['status' => $status]);
            break;
        case 'Financial director':
            $holiday->status_FD = $status;
            Log::info('Updating status_FD', ['status' => $status]);
            break;
        case 'Manager director':
            $holiday->status_MD = $status;
            Log::info('Updating status_MD', ['status' => $status]);
            break;
    }

    // Optionally, set 'confirmed' status if all other statuses are approved
    if ($holiday->status_MD && $holiday->status_HD && $holiday->status_FD && $holiday->status_Ch5) {
        $holiday->confirmed = true;
        Log::info('All statuses approved. Setting confirmed to true');
    } else {
        $holiday->confirmed = false;
        Log::info('Not all statuses approved. Setting confirmed to false');
    }

    $holiday->save();
    Log::info('Holiday status saved', ['holiday' => $holiday]);
    Toastr::success('Holiday status updated successfully :)', 'Success');

    return redirect()->back()->with('status', 'Holiday status updated successfully');
}

    public function index()
    {
        // Fetch holidays from the database
        $holidays = Holiday::all(); // Adjust this to fit your model and query
    
        // Return the view with the holidays data
        return view('settings.holidaydemand', compact('holidays'));
    }
    
    public function destroy($id)
    {
        try {
            $holiday = Holiday::findOrFail($id);
            $holiday->delete();
            Toastr::success('Holiday deleted successfully.', 'Success');
            return redirect()->route('holiday.index')->with('success', 'Advance demand deleted successfully :)');
        } catch (\Exception $e) {
            Log::error('Error deleting holiday: ' . $e->getMessage());
            Toastr::error('Failed to delete holiday.', 'Error');
            return redirect()->route('holiday.index')->with('success', 'Advance demand deleted successfully :)');
        }
    }


    public function update(Request $request, $id)
    {
        DB::beginTransaction();
    
        try {
            // Log incoming request data
            Log::info('Updating holiday with ID: ' . $id . ', Data: ' . json_encode($request->all()));
    
            // Validate request data
            $request->validate([
                'type' => 'nullable|string|max:255',
                'from_date' => 'nullable|date',
                'to_date' => 'nullable|date',
                'reason' => 'nullable|string'
            ]);
    
            // Find the holiday record
            $holiday = Holiday::findOrFail($id);
    
            // Log the old and new values for comparison
            Log::info('Old Values: ' . json_encode($holiday->toArray()));
            Log::info('New Values: ' . json_encode([
                'from_date' => $request->input('start_date', $holiday->from_date),
                'to_date' => $request->input('end_date', $holiday->to_date),
                'status_MD' => $request->input('status_MD', $holiday->status_MD),
                'status_HD' => $request->input('status_HD', $holiday->status_HD),
                'status_FD' => $request->input('status_FD', $holiday->status_FD),
                'status_Ch5' => $request->input('status_Ch5', $holiday->status_Ch5),
                'confirmed' => $request->input('confirmed', $holiday->confirmed),
                'reason' => $request->input('description', $holiday->reason)
            ]));
    
            $holiday->update([
                'from_date' => $request->input('start_date', $holiday->from_date),
                'to_date' => $request->input('end_date', $holiday->to_date),
                'reason' => $request->input('description', $holiday->reason)
            ]);
            
    
            DB::commit();
    
            // Log successful update
            Log::info('Holiday updated successfully.');
    
            Toastr::success('Holiday updated successfully.', 'Success');
            return redirect()->route('holiday.index')->with('success', 'Holiday updated successfully :)');
        } catch (\Illuminate\Validation\ValidationException $e) {
            DB::rollBack();
            Log::error('Validation error: ' . json_encode($e->errors()));
            Toastr::error('Validation error.', 'Error');
            return redirect()->route('holiday.index')->with('error', 'Validation error.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error updating holiday: ' . $e->getMessage());
            Toastr::error('Failed to update holiday.', 'Error');
            return redirect()->route('holiday.index')->with('error', 'Failed to update holiday.');
        }
    }
    
}
