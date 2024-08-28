<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class RegisterController extends Controller
{
    public function register()
    {
        $department  = DB::table('departments')->get();
     
        // Fetch the roles from the database
        $role = DB::table('role_type_users')->get();
        return view('auth.register', compact('role','department'));
    }

    public function storeUser(Request $request)
    {
        Log::info('Registering a new user');

        // Validate the incoming request
        $request->validate([
            'name'      => 'required|string|max:255',
            'email'     => 'required|string|email|max:255|unique:users',
            'phone'     => 'nullable|string|max:20',
            'department'=> 'nullable|string|max:255',
            'salary'    => 'nullable|numeric|digits_between:1,4', // Allows up to 4 digits without decimals
            'role_name' => 'required|string|max:255',
            'password'  => 'required|string|min:8|confirmed',
            'image'     => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Store profile image if provided
        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/profile'), $imageName);
        }

        // Generate a unique matricule
        $userCount = User::count();
        $matricule = 'EMP'.str_pad($userCount + 1, 4, '0', STR_PAD_LEFT);

        // Get the current date and time
        $entryDate = Carbon::now();

        // Create a new user
        User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'phone'     => $request->phone,
            'department'=> $request->department,
            'salary'    => $request->salary,
            'role_name' => $request->role_name,
            'status'    => 'Active', // Default status
            'entry_date'=> $entryDate, // Entry date
            'matricule' => $matricule, // Generated matricule
            'image'     => $imageName, // Save the profile image filename
            'password'  => Hash::make($request->password),
            'checked'  => false, // Admin is active by default
            'position'  => 'NO ASSIGNED POSITION', // Default position
        ]);

        // Display a success message
        Toastr::success('Created new account successfully!', 'Success');
        
        return redirect('login');
    }
}
