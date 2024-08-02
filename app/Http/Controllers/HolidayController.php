<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Holiday;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
class HolidayController extends Controller
{
    public function create()
    {
        return view('settings.holidaydemand'); // Update with your view name
    }    
    public function store(Request $request)
    {
        Log::info('Submitted Data:', $request->all()); // Logs the request data
        
        $request->validate([
            'type' => 'required|string|max:255',
            'from_date' => 'required|date',
            'to_date' => 'required|date',
            'description' => 'nullable|string'
        ]);
    
        // Calculate the number of days between from_date and to_date
        $fromDate = new \DateTime($request->from_date);
        $toDate = new \DateTime($request->to_date);
        $interval = $fromDate->diff($toDate);
        $numberOfDays = $interval->days + 1; // +1 to include the end date
    
        DB::beginTransaction();
        try {
            $holiday = new Holiday([
                'user_id' => $request->user_id,
                'type' => $request->type,
                'from_date' => $request->from_date,
                'to_date' => $request->to_date,
                'number_of_days' => $numberOfDays, // Use calculated value
                'status_MD' => false,
                'status_HD' => false,
                'status_FD' => false,
                'status_Ch5' => false,
                'confirmed' => false,
            ]);
    
            $holiday->save();
    
            DB::commit();
            Toastr::success('Holiday request submitted successfully.', 'Success');
            return redirect()->route('holiday.create')->with('success', 'Holiday request submitted successfully.');
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error('Failed to submit holiday request.', 'Error');
            Log::error('Error submitting holiday request: ' . $e->getMessage(), [
                'request_data' => $request->all(),
                'trace' => $e->getTraceAsString()
            ]);
            return redirect()->route('holiday.create')->with('error', 'Failed to submit holiday request.');
        }
    }
    public function index()
    {
        $holiday = Holiday::all();
        return $holiday; // Update with your view name
    }
    
}
