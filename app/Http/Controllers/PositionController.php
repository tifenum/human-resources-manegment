<?php

namespace App\Http\Controllers;

use App\Models\positionType;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class PositionController extends Controller
{
    public function index()
    {
        $departments = PositionType::all();
        \Log::info($departments); // Log departments to see their structure
        return view('usermanagement.user_control', compact('departments'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'position' => 'required|string|max:255',
        ]);

        PositionType::create([
            'position' => $request->input('position'),
        ]);
        Toastr::success('department added successfully :)', 'Success');

        return redirect()->back()->with('status', 'Position added successfully.');
    }

    public function destroy($id)
    {
        $department = PositionType::findOrFail($id);
        $department->delete();
        Toastr::success('position deleted successfully :)', 'Success');

        return redirect()->back()->with('status', 'position deleted successfully.');
    }
}
