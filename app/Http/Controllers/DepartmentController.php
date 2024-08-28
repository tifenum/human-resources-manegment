<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

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

        return redirect()->back()->with('status', 'Department added successfully.');
    }

    public function destroy($id)
    {
        $department = Department::findOrFail($id);
        $department->delete();

        return redirect()->back()->with('status', 'Department deleted successfully.');
    }
}
