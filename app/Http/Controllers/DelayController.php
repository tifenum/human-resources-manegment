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
            'exit_time' => 'required|string',
            'return_time' => 'required|string',
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
        $delays = Delay::all();
        return view('settings.delaydemand', compact('delays'));
    }

    // Add update function
    public function update(Request $request, $id)
    {
        DB::beginTransaction();

        try {
            // Log incoming request data
            Log::info('Updating delay with ID: ' . $id . ', Data: ' . json_encode($request->all()));

            // Validate request data
            $request->validate([
                'reason' => 'required|string|max:255',
                'exit_time' => 'required|date_format:H:i',
                'return_time' => 'required|date_format:H:i',
                'day' => 'required|string',
            ]);

            // Find the delay record
            $delay = Delay::findOrFail($id);

            // Log the old and new values for comparison
            Log::info('Old Values: ' . json_encode($delay->toArray()));
            Log::info('New Values: ' . json_encode([
                'reason' => $request->input('reason', $delay->reason),
                'exit_time' => $request->input('exit_time'),
                'return_time' => $request->input('return_time'),
                'day' => $request->input('day'),
                'amount_of_time' => $request->input('amount_of_time', $delay->amount_of_time),
                'status_MD' => $request->input('status_MD', $delay->status_MD),
                'status_HD' => $request->input('status_HD', $delay->status_HD),
                'status_FD' => $request->input('status_FD', $delay->status_FD),
                'status_Ch5' => $request->input('status_Ch5', $delay->status_Ch5),
                'confirmed' => $request->input('confirmed', $delay->confirmed),
            ]));

            // Update the record
            $delay->update([
                'reason' => $request->input('reason', $delay->reason),
                'exit_time' => $request->input('exit_time'),
                'return_time' => $request->input('return_time'),
                'day' => $request->input('day'),
                'amount_of_time' => $request->input('amount_of_time', $delay->amount_of_time),
                'status_MD' => $request->input('status_MD', $delay->status_MD),
                'status_HD' => $request->input('status_HD', $delay->status_HD),
                'status_FD' => $request->input('status_FD', $delay->status_FD),
                'status_Ch5' => $request->input('status_Ch5', $delay->status_Ch5),
                'confirmed' => $request->input('confirmed', $delay->confirmed),
            ]);

            DB::commit();

            // Log successful update
            Log::info('Delay updated successfully.');

            Toastr::success('Delay updated successfully.', 'Success');
            return redirect()->route('delay.index')->with('success', 'Delay updated successfully.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            DB::rollBack();
            Log::error('Validation error: ' . json_encode($e->errors()));
            Toastr::error('Validation error.', 'Error');
            return redirect()->route('delay.index')->with('error', 'Validation error.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error updating delay: ' . $e->getMessage());
            Toastr::error('Failed to update delay.', 'Error');
            return redirect()->route('delay.index')->with('error', 'Failed to update delay.');
        }
    }

    // Add destroy function
    public function destroy($id)
    {
        $delay = Delay::findOrFail($id);
        $delay->delete();
        Toastr::success('Delay request deleted successfully.', 'Success');
        return redirect()->route('delay.index')->with('success', 'Delay request deleted successfully.');
    }
}
