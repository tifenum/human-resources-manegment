<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Delay;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DelayController extends Controller
{
    public function create()
    {
        return view('settings.delaydemand'); // Update with your view name
    }

    public function store(Request $request)
    {
        Log::info('Submitted Data:', $request->all()); // Logs the request data
        
        $request->validate([
            'reason' => 'required|string|max:255',
            'exit_time' => 'required|date_format:H:i',
            'return_time' => 'required|date_format:H:i',
            'day' => 'required|date',
        ]);

        $exitTime = new \DateTime($request->exit_time);
        $returnTime = new \DateTime($request->return_time);
        $interval = $exitTime->diff($returnTime);
        $hours = $interval->h;
        $minutes = $interval->i;

        $amountOfTime = "{$hours} hours {$minutes} minutes";

        DB::beginTransaction();
        try {
            $delay = new Delay([
                'user_id' => $request->user_id,
                'reason' => $request->reason,
                'exit_time' => $request->exit_time,
                'return_time' => $request->return_time,
                'day' => $request->day,
                'amount_of_time' => $amountOfTime,
                'status_MD' => false,
                'status_HD' => false,
                'status_FD' => false,
                'status_Ch5' => false,
                'confirmed' => false,
            ]);

            $delay->save();

            DB::commit();
            Toastr::success('Delay request submitted successfully.', 'Success');
            return redirect()->route('delay.create')->with('success', 'Delay request submitted successfully.');
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error('Failed to submit delay request.', 'Error');
            Log::error('Error submitting delay request: ' . $e->getMessage(), [
                'request_data' => $request->all(),
                'trace' => $e->getTraceAsString()
            ]);
            return redirect()->route('delay.create')->with('error', 'Failed to submit delay request.');
        }
    }
    public function index()
    {
        $delay = Delay::all();
        return $delay; // Update with your view name
    }
}
