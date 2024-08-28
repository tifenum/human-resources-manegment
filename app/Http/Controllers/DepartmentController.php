<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::all();
        \Log::info($departments); // Log departments to see their structure
        return view('usermanagement.user_control', compact('departments'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'department' => 'required|string|max:255',
        ]);

        Department::create([
            'department' => $request->input('department'),
        ]);
        Toastr::success('department added successfully :)', 'Success');

        return redirect()->back()->with('status', 'Department added successfully.');
    }

    public function destroy($id)
    {
        $department = Department::findOrFail($id);
        $department->delete();
        Toastr::success('department deleted successfully :)', 'Success');

        return redirect()->back()->with('status', 'Department deleted successfully.');
    }
}
