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
