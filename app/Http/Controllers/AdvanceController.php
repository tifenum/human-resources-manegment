<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Advance;
use Illuminate\Support\Facades\Log; // Correct import for Log
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
                'date_wish' => 'required|string',
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
                // Status fields are now null by default, so no need to explicitly set them to false
            ]);
            $user = Auth::User();

            $activityLog = [
                'user_name'    => $user->name,
                'email'        => $user->email,
                'phone_number' => $user->phone,
                'status'       => $user->status,
                'role_name'    => $user->role_name,
                'modify_user'  => 'Created an Advance Demand',
                'date_time'    => now()->toDayDateTimeString(),
            ];
            DB::table('user_activity_logs')->insert($activityLog);
            Toastr::success('Advance demand submitted successfully :)', 'Success');
            return redirect()->route('advance.index')->with('success', 'Advance demand submitted successfully :)');
    
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Validation error: ' . json_encode($e->errors()));
            Toastr::error('Error :(', 'Error');
            return redirect()->route('advance.index')->with('error', 'Failed to submit advance demand.');
        } catch (\Exception $e) {
            Log::error('General error: ' . $e->getMessage());
            Toastr::error('Error :(', 'Error');
            return redirect()->route('advance.index')->with('error', 'Failed to submit advance demand.');
        }
    }
    
    // public function store(Request $request)
    // {
    //     try {
    //         // Validate the request data
    //         $request->validate([
    //             'amount' => 'required|numeric',
    //             'date_wish' => 'required|string', // Validate as string
    //             'department' => 'required|string',
    //             'description' => 'nullable|string',
    //         ]);
            
    //         // Convert date_wish from DD-MM-YYYY to YYYY-MM-DD
    //         $dateWish = \DateTime::createFromFormat('d-m-Y', $request->input('date_wish'));
    //         $formattedDateWish = $dateWish ? $dateWish->format('Y-m-d') : null;
    
    //         // Create a new advance record
    //         Advance::create([
    //             'user_id' => $request->input('user_id'),
    //             'amount' => $request->input('amount'),
    //             'date_wish' => $formattedDateWish,
    //             'department' => $request->input('department'),
    //             'description' => $request->input('description'),
    //             'chief_staff_status' => false, // Default values
    //             'head_department_status' => false,
    //             'financial_director_status' => false,
    //             'manager_director_status' => false,
    //             'accepted' => false,
    //         ]);
    
    //         Toastr::success('Advance demand submitted successfully :)','Success');
    //         return redirect()->route('advance.index')->with('success', 'Advance demand submitted successfully :)');
    
    //     } catch (\Illuminate\Validation\ValidationException $e) {
    //         Log::error('Validation error: ' . json_encode($e->errors())); // Log validation errors
    //         Toastr::error('Error :(','Error');
    //         return redirect()->route('advance.index')->with('error', 'Failed to submit advance demand.');
    //     } catch (\Exception $e) {
    //         Log::error('General error: ' . $e->getMessage()); // Log general errors
    //         Toastr::error('Error :(','Error');
    //         return redirect()->route('advance.index')->with('error', 'Failed to submit advance demand.');
    //     }
    // }
    public function destroy($id)
    {
        try {
            // Find the advance record by ID
            $advance = Advance::findOrFail($id);
            
            // Delete the record
            $advance->delete();
            $user = Auth::User();

            Toastr::success('Advance demand deleted successfully :)', 'Success');
            $activityLog = [
                'user_name'    => $user->name,
                'email'        => $user->email,
                'phone_number' => $user->phone,
                'status'       => $user->status,
                'role_name'    => $user->role_name,
                'modify_user'  => 'Deleted an Advance Demand',
                'date_time'    => now()->toDayDateTimeString(),
            ];
            DB::table('user_activity_logs')->insert($activityLog);

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
        $user = Auth::User();
        $activityLog = [
            'user_name'    => $user->name,
            'email'        => $user->email,
            'phone_number' => $user->phone,
            'status'       => $user->status,
            'role_name'    => $user->role_name,
            'modify_user'  => 'Updated an Advance Demand',
            'date_time'    => now()->toDayDateTimeString(),
        ];
        DB::table('user_activity_logs')->insert($activityLog);


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
    $user = Auth::User();

    if($status){

        $activityLog = [
            'user_name'    => $user->name,
            'email'        => $user->email,
            'phone_number' => $user->phone,
            'status'       => $user->status,
            'role_name'    => $user->role_name,
            'modify_user'  => 'Accepted an Advance Demand',
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
            'modify_user'  => 'Rejected an Advance Demand',
            'date_time'    => now()->toDayDateTimeString(),
        ];
    }
    DB::table('user_activity_logs')->insert($activityLog);

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

    // Determine if all relevant statuses are approved
    $statusesApproved = 
        $advance->chief_staff_status !== null && 
        $advance->chief_staff_status &&
        $advance->head_department_status !== null && 
        $advance->head_department_status &&
        $advance->financial_director_status !== null && 
        $advance->financial_director_status ||
        $advance->manager_director_status !== null && 
        $advance->manager_director_status;

    $advance->accepted = $statusesApproved;
    Log::info('Advance accepted status updated', ['accepted' => $advance->accepted]);

    $advance->save();
    Log::info('Advance status saved', ['advance' => $advance]);

    // Send email notification if the advance is accepted
    if ($advance->accepted) {
        $user = User::find($advance->user_id);
        
        if ($user) {
            Mail::send('emails.advance_accepted', ['user' => $user], function($message) use ($user) {
                $message->from('boukadidahbib@gmail.com');
                $message->to($user->email);
                $message->subject('Your Advance Demand Has Been Accepted');
            });
            Log::info('Email sent to user', ['email' => $user->email]);
        } else {
            Log::warning('User not found for advance', ['user_id' => $advance->user_id]);
        }
    }

    Toastr::success('Advance status updated successfully :)', 'Success');

    return redirect()->back()->with('status', 'Advance status updated successfully');
}

// public function updateStatus(Request $request, Advance $advance)
// {
//     // Check user role and update the respective status
//     $userRole = auth()->user()->role_name;
//     $status = $request->input('status') === 'approve';

//     Log::info('User role:', ['role' => $userRole]);
//     Log::info('Status:', ['status' => $status]);

//     switch ($userRole) {
//         case 'Chief of staff':
//             $advance->chief_staff_status = $status;
//             Log::info('Updating chief_staff_status', ['status' => $status]);
//             break;
//         case 'Head of department':
//             $advance->head_department_status = $status;
//             Log::info('Updating head_department_status', ['status' => $status]);
//             break;
//         case 'Financial director':
//             $advance->financial_director_status = $status;
//             Log::info('Updating financial_director_status', ['status' => $status]);
//             break;
//         case 'Manager director':
//             $advance->manager_director_status = $status;
//             Log::info('Updating manager_director_status', ['status' => $status]);
//             break;
//     }

//     // Optionally, set 'accepted' status if all other statuses are approved
//     if ($advance->chief_staff_status && $advance->head_department_status && $advance->financial_director_status || $advance->manager_director_status) {
//         $advance->accepted = true;
//         Log::info('All statuses approved. Setting accepted to true');
//     } else {
//         $advance->accepted = false;
//         Log::info('Not all statuses approved. Setting accepted to false');
//     }

//     $advance->save();
//     Log::info('Advance status saved', ['advance' => $advance]);

//     // Send email notification if the advance is accepted
//     if ($advance->accepted) {
//         $user = User::find($advance->user_id);
        
//         if ($user) {
//             Mail::send('emails.advance_accepted', ['user' => $user], function($message) use ($user) {
//                 $message->from('boukadidahbib@gmail.com');
//                 $message->to($user->email);
//                 $message->subject('Your Advance Demand Has Been Accepted');
//             });
//             Log::info('Email sent to user', ['email' => $user->email]);
//         } else {
//             Log::warning('User not found for advance', ['user_id' => $advance->user_id]);
//         }
//     }

//     Toastr::success('Advance demand submitted successfully :)','Success');

//     return redirect()->back()->with('status', 'Advance status updated successfully');
// }
}
