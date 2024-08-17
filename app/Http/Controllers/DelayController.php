<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Delay;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DelayController extends Controller
{
    public function create()
    {
        return view('settings.delaydemand'); // Update with your view name
    }
    public function updateStatus(Request $request, $id)
    {
        // Find the delay record by ID
        $delay = Delay::findOrFail($id);
    
        // Check user role and update the respective status
        $userRole = auth()->user()->role_name;
        $status = $request->input('status') === 'approve';
        $user = Auth::User();

        if($status){
    
            $activityLog = [
                'user_name'    => $user->name,
                'email'        => $user->email,
                'phone_number' => $user->phone,
                'status'       => $user->status,
                'role_name'    => $user->role_name,
                'modify_user'  => 'Accepted a Delay Demand',
                'date_time'    => now()->toDayDateTimeString(),
            ];
    
            // Perform the update and log the activity
        }
        else{
            $activityLog = [
                'user_name'    => $user->name,
                'email'        => $user->email,
                'phone_number' => $user->phone,
                'status'       => $user->status,
                'role_name'    => $user->role_name,
                'modify_user'  => 'Rejected a Delay Demand',
                'date_time'    => now()->toDayDateTimeString(),
            ];
        }
        DB::table('user_activity_logs')->insert($activityLog);
    
        Log::info('User role:', ['role' => $userRole]);
        Log::info('Status:', ['status' => $status]);
    
        switch ($userRole) {
            case 'Chief of staff':
                $delay->status_Ch5 = $status;
                Log::info('Updating status_Ch5', ['status' => $status]);
                break;
            case 'Head of department':
                $delay->status_HD = $status;
                Log::info('Updating status_HD', ['status' => $status]);
                break;
            case 'Financial director':
                $delay->status_FD = $status;
                Log::info('Updating status_FD', ['status' => $status]);
                break;
            case 'Manager director':
                $delay->status_MD = $status;
                Log::info('Updating status_MD', ['status' => $status]);
                break;
        }
    
        // Optionally, set 'confirmed' status if all other statuses are approved
        if ($delay->status_HD && $delay->status_Ch5) {
            $delay->confirmed = true;
            Log::info('All statuses approved. Setting confirmed to true');
        } else {
            $delay->confirmed = false;
            Log::info('Not all statuses approved. Setting confirmed to false');
        }
    
        $delay->save();
        if ($delay->confirmed) {
            $user = User::find($delay->user_id);
            
            if ($user) {
                Mail::send('emails.delay_accepted', ['user' => $user, 'delay' => $delay], function($message) use ($user) {
                    $message->from('boukadidahbib@gmail.com');
                    $message->to($user->email);
                    $message->subject('Your delay Demand Has Been Accepted');
                });
                Log::info('Email sent to user', ['email' => $user->email]);
            } else {    
                Log::warning('User not found for delay', ['user_id' => $delay->user_id]);
            }
        }
        Log::info('delay status saved', ['delay' => $delay]);
        Toastr::success('delay status updated successfully :)', 'Success');
    
        return redirect()->back()->with('status', 'delay status updated successfully');
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
        $user = Auth::User();
        $activityLog = [
            'user_name'    => $user->name,
            'email'        => $user->email,
            'phone_number' => $user->phone,
            'status'       => $user->status,
            'role_name'    => $user->role_name,
            'modify_user'  => 'Created a Delay Demand',
            'date_time'    => now()->toDayDateTimeString(),
        ];
        DB::table('user_activity_logs')->insert($activityLog);

        DB::beginTransaction();
        try {
            $delay = new Delay([
                'user_id' => $request->user_id,
                'reason' => $request->reason,
                'exit_time' => $request->exit_time,
                'return_time' => $request->return_time,
                'day' => $request->day,
                'amount_of_time' => $amountOfTime,
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
        $user = Auth::user(); // Get the currently authenticated user

        if ($user->role_name === 'Employee') {
            // If the user is an Employee, get only their own advances
            $delays = Delay::where('user_id', $user->id)->get();
        } else {
            // If the user has any other role, get all advances
            $delays = Delay::all();
        }       
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
                'exit_time' => 'required|string',
                'return_time' => 'required|string',
                'day' => 'required|string',
            ]);
            $user = Auth::User();
            $activityLog = [
                'user_name'    => $user->name,
                'email'        => $user->email,
                'phone_number' => $user->phone,
                'status'       => $user->status,
                'role_name'    => $user->role_name,
                'modify_user'  => 'Updated a Delay Demand',
                'date_time'    => now()->toDayDateTimeString(),
            ];
            DB::table('user_activity_logs')->insert($activityLog);
    
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
        $user = Auth::User();
        $activityLog = [
            'user_name'    => $user->name,
            'email'        => $user->email,
            'phone_number' => $user->phone,
            'status'       => $user->status,
            'role_name'    => $user->role_name,
            'modify_user'  => 'Deleted a Delay Demand',
            'date_time'    => now()->toDayDateTimeString(),
        ];
        DB::table('user_activity_logs')->insert($activityLog);

        return redirect()->route('delay.index')->with('success', 'Delay request deleted successfully.');
    }
}
