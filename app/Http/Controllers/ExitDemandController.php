<?php
    
    namespace App\Http\Controllers;

    use App\Models\ExitDemand;
    use Illuminate\Http\Request;
    use Brian2694\Toastr\Facades\Toastr;
    use Carbon\Carbon;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Log;

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
                'status_MD' => false,
                'status_HD' => false,
                'status_FD' => false,
                'status_Ch5' => false,
                'confirmed' => false,
            ]);
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
                $holiday    ->confirmed = true;
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
            $exitdemand = ExitDemand::all();
            return view('settings.exitpermission', compact('exitdemand'));

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
            'exit_day' => 'required|date_format:Y-m-d', // Adjusted date format
            'department' => 'required|string|max:255',
        ]);

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
            'exit_day' => $request->input('exit_day'), // Using the provided date format
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
            return redirect()->route('exit.index')->with('success', 'Holiday request submitted successfully.');

        }
    }
