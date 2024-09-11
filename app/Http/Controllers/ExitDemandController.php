<?php
    
    namespace App\Http\Controllers;

    use App\Models\ExitDemand;
    use Illuminate\Http\Request;
    use Brian2694\Toastr\Facades\Toastr;
    use Carbon\Carbon;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Log;
    use Illuminate\Support\Facades\Mail;
    use App\Models\User;
    use Illuminate\Support\Facades\Auth;

    class ExitDemandController extends Controller
    {
        public function create()
        {
            return view('settings.exitpermission');
        }

        public function store(Request $request)
        {
            $request->validate([
                'reason' => 'required|string|max:255',
                'exit_day' => 'required|string|date_format:d-m-Y',
                'department' => 'required|string|max:255',
            ]);
            $exitDate = Carbon::createFromFormat('d-m-Y', $request->input('exit_day'))->format('Y-m-d');

            ExitDemand::create([
                'user_id' => $request->user_id,
                'reason' => $request->reason,
                'exit_day' => $exitDate,
                'department' => $request->department,
            ]);
            $user = Auth::User();
            $activityLog = [
                'user_name'    => $user->name,
                'email'        => $user->email,
                'phone_number' => $user->phone,
                'status'       => $user->status,
                'role_name'    => $user->role_name,
                'modify_user'  => 'Created an Exit Demand',
                'date_time'    => now()->toDayDateTimeString(),
            ];
            DB::table('user_activity_logs')->insert($activityLog);

            Toastr::success('Exit request submitted successfully.', 'Success');
            return redirect()->route('exit.index')->with('success', 'Holiday request submitted successfully.');

        }
        public function updateStatus(Request $request, $id)
        {
            // Find the holiday record by ID
            $holiday = ExitDemand::findOrFail($id);
        
            // Check user role and update the respective status
            $userRole = auth()->user()->role_name;
            $status = $request->input('status') === 'approve';
        
            Log::info('User role:', ['role' => $userRole]);
            Log::info('Status:', ['status' => $status]);
            $user = Auth::User();

    if($status){

        $activityLog = [
            'user_name'    => $user->name,
            'email'        => $user->email,
            'phone_number' => $user->phone,
            'status'       => $user->status,
            'role_name'    => $user->role_name,
            'modify_user'  => 'Accepted an Exit Demand',
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
            'modify_user'  => 'Rejected an Exit Demand',
            'date_time'    => now()->toDayDateTimeString(),
        ];
    }
    DB::table('user_activity_logs')->insert($activityLog);

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
            if ($holiday->status_MD || $holiday->status_HD && $holiday->status_Ch5) {
                $holiday->confirmed = true;
                Log::info('All statuses approved. Setting confirmed to true');
            } else {
                $holiday->confirmed = false;
                Log::info('Not all statuses approved. Setting confirmed to false');
            }
        
            $holiday->save();
            if ($holiday->confirmed) {
                $user = User::find($holiday->user_id);
                
                if ($user) {
                    Mail::send('emails.exit_accepted', ['user' => $user, 'exit' => $holiday], function($message) use ($user) {
                        $message->from('it.yasmine@houdahotelstunisia.com');
                        $message->to($user->email);
                        $message->subject('Your Exit Demand Has Been Accepted');
                    });
                    Log::info('Email sent to user', ['email' => $user->email]);
                } else {
                    Log::warning('User not found for holiday', ['user_id' => $holiday->user_id]);
                }
                $holiday->delete();
            }
            Log::info('Holiday status saved', ['holiday' => $holiday]);
            Toastr::success('Exit status updated successfully :)', 'Success');
        
            return redirect()->back()->with('status', 'Holiday status updated successfully');
        }
        // public function index()
        // {
        //     $user = Auth::user(); // Get the currently authenticated user

        //     if ($user->role_name === 'Employee') {
        //         // If the user is an Employee, get only their own advances
        //         $exitdemand = ExitDemand::where('user_id', $user->id)->get();
        //     } else {
        //         // If the user has any other role, get all advances
        //         $exitdemand = ExitDemand::all();
        //     }       
        //     return view('settings.exitpermission', compact('exitdemand'));

        // }
        public function index()
        {
            $user = Auth::user();
            $exitdemand = ExitDemand::where('user_id', $user->id)->with('user')->get();

             return view('settings.exitpermission', compact('exitdemand'));
    }
    public function index2()
    {
        $user = Auth::user();
        if ($user->role_name === 'Manager director' || $user->role_name === 'Financial director') {
            // Fetch all advances without filtering by department
            $exitdemand = ExitDemand::all();
        } else {
        $exitdemand = ExitDemand::whereHas('user', function($query) use ($user) {
            $query->where('department', $user->department);
        })
        ->with('user') // Ensure that the user relationship is also loaded
        ->get();

        }
         return view('settings.exitpermission2', compact('exitdemand'));
}
        // Add update function
        public function update(Request $request, $id)
        {
            DB::beginTransaction();
        
            try {
                // Log incoming request data
                Log::info('Updating exit demand with ID: ' . $id . ', Data: ' . json_encode($request->all()));
        
                // Validate request data
                $request->validate([
                    'reason' => 'required|string|max:255',
                    'exit_day' => 'required|date_format:Y-m-d', // Expect 'Y-m-d' format
                    'department' => 'required|string|max:255',
                ]);
        
                $user = Auth::user();
                $activityLog = [
                    'user_name'    => $user->name,
                    'email'        => $user->email,
                    'phone_number' => $user->phone,
                    'status'       => $user->status,
                    'role_name'    => $user->role_name,
                    'modify_user'  => 'Updated an Exit Demand',
                    'date_time'    => now()->toDayDateTimeString(),
                ];
                DB::table('user_activity_logs')->insert($activityLog);
        
                // Find the exit demand record
                $exitDemand = ExitDemand::findOrFail($id);
        
                // Log the old and new values for comparison
                Log::info('Old Values: ' . json_encode($exitDemand->toArray()));
                Log::info('New Values: ' . json_encode([
                    'reason' => $request->input('reason', $exitDemand->reason),
                    'exit_day' => $request->input('exit_day'), // Using the provided date format
                    'department' => $request->input('department', $exitDemand->department),
                    'status_MD' => $request->input('status_MD', $exitDemand->status_MD),
                    'status_HD' => $request->input('status_HD', $exitDemand->status_HD),
                    'status_FD' => $request->input('status_FD', $exitDemand->status_FD),
                    'status_Ch5' => $request->input('status_Ch5', $exitDemand->status_Ch5),
                    'confirmed' => $request->input('confirmed', $exitDemand->confirmed),
                ]));
        
                // Update the record
                $exitDemand->update([
                    'reason' => $request->input('reason', $exitDemand->reason),
                    'exit_day' => $request->input('exit_day'), // No conversion needed if using 'Y-m-d'
                    'department' => $request->input('department', $exitDemand->department),
                    'status_MD' => $request->input('status_MD', $exitDemand->status_MD),
                    'status_HD' => $request->input('status_HD', $exitDemand->status_HD),
                    'status_FD' => $request->input('status_FD', $exitDemand->status_FD),
                    'status_Ch5' => $request->input('status_Ch5', $exitDemand->status_Ch5),
                    'confirmed' => $request->input('confirmed', $exitDemand->confirmed),
                ]);
        
                DB::commit();
        
                // Log successful update
                Log::info('Exit demand updated successfully.');
        
                Toastr::success('Exit demand updated successfully.', 'Success');
                return redirect()->route('exitdemand.index')->with('success', 'Exit demand updated successfully.');
            } catch (\Illuminate\Validation\ValidationException $e) {
                DB::rollBack();
                Log::error('Validation error: ' . json_encode($e->errors()));
                Toastr::error('Validation error.', 'Error');
                return redirect()->route('exitdemand.index')->with('error', 'Validation error.');
            } catch (\Exception $e) {
                DB::rollBack();
                Log::error('Error updating exit demand: ' . $e->getMessage());
                Toastr::error('Failed to update exit demand.', 'Error');
                return redirect()->route('exitdemand.index')->with('error', 'Failed to update exit demand.');
            }
        }
        

        // Add destroy function
        public function destroy($id)
        {
            $exitDemand = ExitDemand::findOrFail($id);
            $exitDemand->delete();

            Toastr::success('Exit request deleted successfully.', 'Success');
            $user = Auth::User();
            $activityLog = [
                'user_name'    => $user->name,
                'email'        => $user->email,
                'phone_number' => $user->phone,
                'status'       => $user->status,
                'role_name'    => $user->role_name,
                'modify_user'  => 'Deleted an Exit Demand',
                'date_time'    => now()->toDayDateTimeString(),
            ];
            DB::table('user_activity_logs')->insert($activityLog);

            return redirect()->route('exit.index')->with('success', 'Holiday request submitted successfully.');

        }
    }
