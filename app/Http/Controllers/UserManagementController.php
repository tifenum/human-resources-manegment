<?php

namespace App\Http\Controllers;
use Brian2694\Toastr\Facades\Toastr;

use Illuminate\Http\Request;
use DB;
use App\Models\User;
use App\Models\Employee;
use App\Models\Form;
use App\Models\ProfileInformation;
use App\Rules\MatchOldPassword;
use Carbon\Carbon;
use Session;
use Auth;
use Hash;
use Illuminate\Support\Facades\Log;
class UserManagementController extends Controller
{
    public function index()
    {
        if (Auth::user()->role_name=='Admin')
        {
            $result      = DB::table('users')->get();
            $role_name   = DB::table('role_type_users')->get();
            $position    = DB::table('position_types')->get();
            $department  = DB::table('departments')->get();
            $status_user = DB::table('user_types')->get();
            return view('usermanagement.user_control',compact('result','role_name','position','department','status_user'));
        }
        else
        {
            return redirect()->route('home');
        }
        
    }
    // search user
    public function searchUser(Request $request)
    {
        if (Auth::user()->role_name=='Admin')
        {
            $users      = DB::table('users')->get();
            $result     = DB::table('users')->get();
            $role_name  = DB::table('role_type_users')->get();
            $position   = DB::table('position_types')->get();
            $department = DB::table('departments')->get();
            $status_user = DB::table('user_types')->get();

            // search by name
            if($request->name)
            {
                $result = User::where('name','LIKE','%'.$request->name.'%')->get();
            }

            // search by role name
            if($request->role_name)
            {
                $result = User::where('role_name','LIKE','%'.$request->role_name.'%')->get();
            }

            // search by status
            if($request->status)
            {
                $result = User::where('status','LIKE','%'.$request->status.'%')->get();
            }

            // search by name and role name
            if($request->name && $request->role_name)
            {
                $result = User::where('name','LIKE','%'.$request->name.'%')
                                ->where('role_name','LIKE','%'.$request->role_name.'%')
                                ->get();
            }

            // search by role name and status
            if($request->role_name && $request->status)
            {
                $result = User::where('role_name','LIKE','%'.$request->role_name.'%')
                                ->where('status','LIKE','%'.$request->status.'%')
                                ->get();
            }

            // search by name and status
            if($request->name && $request->status)
            {
                $result = User::where('name','LIKE','%'.$request->name.'%')
                                ->where('status','LIKE','%'.$request->status.'%')
                                ->get();
            }

            // search by name and role name and status
            if($request->name && $request->role_name && $request->status)
            {
                $result = User::where('name','LIKE','%'.$request->name.'%')
                                ->where('role_name','LIKE','%'.$request->role_name.'%')
                                ->where('status','LIKE','%'.$request->status.'%')
                                ->get();
            }
            Log::info('Update profile requested for user ID: ' . $result);

            return view('usermanagement.user_control',compact('users','role_name','position','department','status_user','result'));
        }
        else
        {
            return redirect()->route('home');
        }
    
    }
    public function updateProfile(Request $request)
    {
        $user = Auth::user();
    
        // Log the start of the function
        Log::info('Update profile requested for user ID: ' . $user->id);
        Log::info('Request data: ', $request->all());
    
        try {
            // Validate the incoming request data
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255',
                'phone' => 'required|string|max:15',
                'department' => 'required|string|max:255',
                'entry_date' => 'required|date_format:d-m-Y', // Ensure correct date format validation
                'salary' => 'required|numeric',
                'image' => 'nullable|image|max:2048',
            ]);
        
            Log::info('Validation successful for user ID: ' . $user->id);
            Log::info('Validated data: ', $validatedData);
    
            // Handle the profile image upload
            if ($request->hasFile('image')) {
                Log::info('Profile image upload detected for user ID: ' . $user->id);
                $image = $request->file('image');
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/profile'), $filename);
                $user->image = $filename;
                Log::info('Profile image uploaded successfully for user ID: ' . $user->id . ' - Filename: ' . $filename);
            }
    
            // Update user information
            $user->name = $validatedData['name'];
            $user->email = $validatedData['email'];
            $user->phone = $validatedData['phone'];
            $user->department = $validatedData['department'];
            $user = Auth::User();
            $activityLog = [
                'user_name'    => $user->name,
                'email'        => $user->email,
                'phone_number' => $user->phone,
                'status'       => $user->status,
                'role_name'    => $user->role_name,
                'modify_user'  => 'Updated his Profile',
                'date_time'    => now()->toDayDateTimeString(),
            ];
    
            // Perform the update and log the activity
            DB::table('user_activity_logs')->insert($activityLog);
            // Convert entry_date from d-m-Y to a Carbon instance
            $entryDate = Carbon::createFromFormat('d-m-Y', $validatedData['entry_date']);
            $user->entry_date = $entryDate;
            Log::info('Entry date converted and updated successfully for user ID: ' . $user->id . ' - Entry Date: ' . $user->entry_date);
    
            $user->salary = $validatedData['salary'];

            $user->save();
            Toastr::success('Profile Information updated successfully :)', 'Success');

            Log::info('Profile updated successfully for user ID: ' . $user->id);
    
            return redirect()->back()->with('success', 'Profile updated successfully.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Log validation errors
            Log::error('Validation error: ' . json_encode($e->errors()));
            Toastr::error('Profile Information update failed due to validation errors.', 'Error');
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            Toastr::error('Profile Information update failed :)', 'Error');
            Log::error('Profile update failed for user ID: ' . $user->id . ' - ' . $e->getMessage());
            return redirect()->back()->with('error', 'Profile update failed. Please try again.');
        }
        
    }
    
    
    
      
    // public function updateProfile(Request $request)
    // {
    //     $user = Auth::user();
    
    //     // Log the start of the function
    //     Log::info('Update profile requested for user ID: ' . $user->id);
    //     Log::info('Request data: ', $request->all());
    
    //     try {
    //         // Validate the incoming request data
    //         $validatedData = $request->validate([
    //             'name' => 'required|string|max:255',
    //             'email' => 'required|string|email|max:255',
    //             'phone' => 'required|string|max:15',
    //             'department' => 'required|string|max:255',
    //             'entry_date' => 'required|date_format:d-m-Y', // Ensure correct date format validation
    //             'salary' => 'required|numeric',
    //             'image' => 'nullable|image|max:2048',
    //         ]);
        
    //         Log::info('Validation successful for user ID: ' . $user->id);
    //         Log::info('Validated data: ', $validatedData);
    
    //         // Handle the profile image upload
    //         if ($request->hasFile('image')) {
    //             Log::info('Profile image upload detected for user ID: ' . $user->id);
    //             $image = $request->file('image');
    //             $filename = time() . '.' . $image->getClientOriginalExtension();
    //             $image->move(public_path('images/profile'), $filename);
    //             $user->image = $filename;
    //             Log::info('Profile image uploaded successfully for user ID: ' . $user->id . ' - Filename: ' . $filename);
    //         }
    
    //         // Update user information
    //         $user->name = $validatedData['name'];
    //         $user->email = $validatedData['email'];
    //         $user->phone = $validatedData['phone'];
    //         $user->department = $validatedData['department'];
    
    //         // Convert entry_date from d-m-Y to a Carbon instance
    //         $entryDate = Carbon::createFromFormat('d-m-Y', $validatedData['entry_date']);
    //         $user->entry_date = $entryDate;
    //         Log::info('Entry date converted and updated successfully for user ID: ' . $user->id . ' - Entry Date: ' . $user->entry_date);
    
    //         $user->salary = $validatedData['salary'];

    //         $user->save();
    //         Toastr::success('Profile Information updated successfully :)', 'Success');

    //         Log::info('Profile updated successfully for user ID: ' . $user->id);
    
    //         return redirect()->back()->with('success', 'Profile updated successfully.');
    //     } catch (\Illuminate\Validation\ValidationException $e) {
    //         // Log validation errors
    //         Log::error('Validation error: ' . json_encode($e->errors()));
    //         Toastr::error('Profile Information update failed due to validation errors.', 'Error');
    //         return redirect()->back()->withErrors($e->errors())->withInput();
    //     } catch (\Exception $e) {
    //         Toastr::error('Profile Information update failed :)', 'Error');
    //         Log::error('Profile update failed for user ID: ' . $user->id . ' - ' . $e->getMessage());
    //         return redirect()->back()->with('error', 'Profile update failed. Please try again.');
    //     }
    // }
    
    
    // use activity log
    public function activityLog()
    {
        $activityLog = DB::table('user_activity_logs')->get();
        return view('usermanagement.user_activity_log',compact('activityLog'));
    }
    // activity log
    public function activityLogInLogOut()
    {
        $activityLog = DB::table('activity_logs')->get();
        return view('usermanagement.activity_log',compact('activityLog'));
    }

    // profile user
    public function profile()
    {   
        $user = Auth::User();
        Session::put('user', $user);
        $user=Session::get('user');
        $profile = $user->rec_id;
       
        $user = DB::table('users')->get();
        $employees = DB::table('profile_information')->where('rec_id',$profile)->first();

        if(empty($employees))
        {
            $information = DB::table('profile_information')->where('rec_id',$profile)->first();
            return view('usermanagement.profile_user',compact('information','user'));

        }else{
            $rec_id = $employees->rec_id;
            if($rec_id == $profile)
            {
                $information = DB::table('profile_information')->where('rec_id',$profile)->first();
                return view('usermanagement.profile_user',compact('information','user'));
            }else{
                $information = ProfileInformation::all();
                return view('usermanagement.profile_user',compact('information','user'));
            } 
        }
       
    }

    // save profile information
    public function profileInformation(Request $request)
    {
        try{
            if(!empty($request->images))
            {
                $image_name = $request->hidden_image;
                $image = $request->file('images');
                if($image_name =='photo_defaults.jpg')
                {
                    if($image != '')
                    {
                        $image_name = rand() . '.' . $image->getClientOriginalExtension();
                        $image->move(public_path('/assets/images/'), $image_name);
                    }
                }
                else{
                    if($image != '')
                    {
                        $image_name = rand() . '.' . $image->getClientOriginalExtension();
                        $image->move(public_path('/assets/images/'), $image_name);
                    }
                }
                $update = [
                    'rec_id' => $request->rec_id,
                    'name'   => $request->name,
                    'avatar' => $image_name,
                ];
                User::where('rec_id',$request->rec_id)->update($update);
            } 

            $information = ProfileInformation::updateOrCreate(['rec_id' => $request->rec_id]);
            $information->name         = $request->name;
            $information->rec_id       = $request->rec_id;
            $information->email        = $request->email;
            $information->birth_date   = $request->birthDate;
            $information->gender       = $request->gender;
            $information->address      = $request->address;
            $information->state        = $request->state;
            $information->country      = $request->country;
            $information->pin_code     = $request->pin_code;
            $information->phone_number = $request->phone_number;
            $information->department   = $request->department;
            $information->designation  = $request->designation;
            $information->reports_to   = $request->reports_to;
            $information->save();

            DB::commit();
            Toastr::success('Profile Information successfully :)','Success');
            return redirect()->back();
        }catch(\Exception $e){
            DB::rollback();
            Toastr::error('Add Profile Information fail :)','Error');
            return redirect()->back();
        }
    }
   
    // save new user
    // public function addNewUserSave(Request $request)
    // {
    //     $request->validate([
    //         'name'      => 'required|string|max:255',
    //         'email'     => 'required|string|email|max:255|unique:users',
    //         'phone'     => 'required|min:11|numeric',
    //         'role_name' => 'required|string|max:255',
    //         'department'=> 'required|string|max:255',
    //         'status'    => 'required|string|max:255',
    //         'image'     => 'required|image',
    //         'password'  => 'required|string|min:8|confirmed',
    //         'password_confirmation' => 'required',
    //         'salary'    => 'required|numeric',
    //     ]);
    
    //     DB::beginTransaction();
    //     try {
    //         Log::info('Add Request Data:', $request->all());

    //         $dt        = Carbon::now();
    //         $todayDate = $dt->toDayDateTimeString();
    
    //         $image = time() . '.' . $request->image->extension();  
    //         $request->image->move(public_path('images/profile'), $image);
    //         $userCount = User::count();
    //         $matricule = 'EMP'.str_pad($userCount + 1, 4, '0', STR_PAD_LEFT);
    //         $user = new User;
    //         $user->name        = $request->name;
    //         $user->email       = $request->email;
    //         $user->entry_date   = $todayDate;
    //         $user->phone       = $request->phone;
    //         $user->role_name   = $request->role_name;
    //         $user->department  = $request->department;
    //         $user->status      = $request->status;
    //         $user->image       = $image;
    //         $user->matricule    = $matricule;
    //         $user->salary       = $request->salary;
    //         $user->password    = Hash::make($request->password);
    //         $user->save();
    
    //         DB::commit();
    
    //         Toastr::success('Create new account successfully :)', 'Success');
    //         return redirect()->route('userManagement');
    //     } catch (\Exception $e) {
    //         DB::rollback();
            
    //         // Log the error message and stack trace
    //         \Log::error('Error creating new user: ' . $e->getMessage());
    //         \Log::error($e->getTraceAsString());
            
    //         Toastr::error('User add new account failed :)', 'Error');
    //         return redirect()->back();
    //     }
    // }
    public function addNewUserSave(Request $request)
{
    try {
        // Validate the incoming request data
        $request->validate([
            'name'      => 'required|string|max:255',
            'email'     => 'required|string|email|max:255|unique:users',
            'phone'     => 'required|min:11|numeric',
            'role_name' => 'required|string|max:255',
            'department'=> 'required|string|max:255',
            'status'    => 'required|string|max:255',
            'image'     => 'required|image',
            'password'  => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required',
            'salary'    => 'required|numeric',
        ]);

        DB::beginTransaction();

        Log::info('Add Request Data:', $request->all());

        $dt        = Carbon::now();
        $todayDate = $dt->toDayDateTimeString();

        $image = time() . '.' . $request->image->extension();  
        $request->image->move(public_path('images/profile'), $image);

        $userCount = User::count();
        $matricule = 'EMP'.str_pad($userCount + 1, 4, '0', STR_PAD_LEFT);

        $user = new User;
        $user->name        = $request->name;
        $user->email       = $request->email;
        $user->entry_date  = $todayDate;
        $user->phone       = $request->phone;
        $user->role_name   = $request->role_name;
        $user->department  = $request->department;
        $user->status      = $request->status;
        $user->image       = $image;
        $user->matricule   = $matricule;
        $user->salary      = $request->salary;
        $user->password    = Hash::make($request->password);
        $user->save();
        $activityLog = [
            'user_name'    => $user->name,
            'email'        => $user->email,
            'phone_number' => $user->phone,
            'status'       => $user->status,
            'role_name'    => $user->role_name,
            'modify_user'  => 'added a new user',
            'date_time'    => now()->toDayDateTimeString(),
        ];

        // Perform the update and log the activity
        DB::table('user_activity_logs')->insert($activityLog);
        DB::commit();

        Toastr::success('Create new account successfully :)', 'Success');
        return redirect()->route('userManagement');

    } catch (\Illuminate\Validation\ValidationException $e) {
        DB::rollback();

        // Loop through the validation errors and add them to Toastr
        foreach ($e->errors() as $field => $messages) {
            foreach ($messages as $message) {
                Toastr::error($message, 'Validation Error');
            }
        }

        return redirect()->back()->withErrors($e->errors())->withInput();
    } catch (\Exception $e) {
        DB::rollback();

        // Log the error message and stack trace
        \Log::error('Error creating new user: ' . $e->getMessage());
        \Log::error($e->getTraceAsString());

        Toastr::error('User add new account failed :)', 'Error');
        return redirect()->back()->withInput();
    }
}

    
    // update
    public function update(Request $request)
    {
        DB::beginTransaction();
        try {
            // Log the incoming request data
            Log::info('Update Request Data:', $request->all());
    
            // Get the request data
            $rec_id     = $request->rec_id;
            $name       = $request->name;
            $email      = $request->email;
            $role_name  = $request->role_name;
            $salary     = $request->salary;
            $phone      = $request->phone;
            $department = $request->department;
            $status     = $request->status;
    
            // Log extracted variables
            Log::info('Extracted Data:', compact('rec_id', 'name', 'email', 'role_name', 'salary', 'phone', 'department', 'status'));
    
            // Retrieve the existing user record
            $user = User::find($rec_id);
    
            // Handle the image file
            $image_name = $user->image; // Default to the existing image
            $image = $request->file('image');
    
            if ($image) {
                // Generate a new image name and move the file
                $image_name = rand() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/profile'), $image_name);
    
                // Log image processing
                Log::info('Image uploaded:', ['image_name' => $image_name]);
            }
    
            // Prepare the data for update
            $update = [
                'name'         => $name,
                'email'        => $email,
                'role_name'    => $role_name,
                'salary'       => $salary,
                'phone'        => $phone,
                'department'   => $department,
                'status'       => $status,
                'image'        => $image_name,
            ];
    
            // Log the prepared update data
            Log::info('Update Data:', $update);
    
            // Log the activity
            $activityLog = [
                'user_name'    => $name,
                'email'        => $email,
                'phone_number' => $phone,
                'status'       => $status,
                'role_name'    => $role_name,
                'modify_user'  => 'Updated a User',
                'date_time'    => now()->toDayDateTimeString(),
            ];
    
            // Perform the update and log the activity
            DB::table('user_activity_logs')->insert($activityLog);
            User::where('id', $rec_id)->update($update);
    
            DB::commit();
            Toastr::success('User updated successfully :)', 'Success');
            Log::info('User updated successfully.', ['rec_id' => $rec_id]);
    
            return redirect()->route('userManagement');
    
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error('User update failed :)', 'Error');
    
            // Log the error with a full stack trace
            Log::error('User update failed:', [
                'error' => $e->getMessage(),
                'stack_trace' => $e->getTraceAsString()
            ]);
    
            return redirect()->back();
        }
    }
    
    
    // delete
    public function delete(Request $request)
    {
        $user = Auth::User();
        Session::put('user', $user);
        $user = Session::get('user');
        DB::beginTransaction();
        try {
            if ($request->image === 'photo_defaults.jpg') {
                User::destroy($request->id);
            } else {
                User::destroy($request->id);
                $imagePath = 'images/profile/' . $request->image;
                
                // Check if the file exists and is not a directory
                if (file_exists($imagePath) && !is_dir($imagePath)) {
                    unlink($imagePath);
                } else {
                    \Log::warning('Attempted to delete non-existent file or directory: ' . $imagePath);
                }
            }
            DB::commit();
            $activityLog = [
                'user_name'    => $user->name,
                'email'        => $user->email,
                'phone_number' => $user->phone,
                'status'       => $user->status,
                'role_name'    => $user->role_name,
                'modify_user'  => 'Deleted a user',
                'date_time'    => now()->toDayDateTimeString(),
            ];
    
            // Perform the update and log the activity
            DB::table('user_activity_logs')->insert($activityLog);
            Toastr::success('User deleted successfully :)', 'Success');
            return redirect()->route('userManagement');
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error('User deletion failed :)', 'Error');
            \Log::error('Error deleting user: ' . $e->getMessage());
            \Log::error($e->getTraceAsString());
            return redirect()->back();
        }
    }
    

    // view change password
    public function changePasswordView()
    {
        return view('settings.changepassword');
    }
    
    // change password in db
    public function changePasswordDB(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
        DB::commit();
        Toastr::success('User change successfully :)','Success');
        return redirect()->intended('home');
    }
}









