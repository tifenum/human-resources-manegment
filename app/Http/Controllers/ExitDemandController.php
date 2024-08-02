<?php

namespace App\Http\Controllers;

use App\Models\ExitDemand;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class ExitDemandController extends Controller
{
    public function create()
    {
        return view('exit_demand.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'reason' => 'required|string|max:255',
            'exit_day' => 'required|date',
            'department' => 'required|string|max:255',
        ]);

        ExitDemand::create([
            'user_id' => $request->user_id,
            'reason' => $request->reason,
            'exit_day' => $request->exit_day,
            'department' => $request->department,
            'status_MD' => false,
            'status_HD' => false,
            'status_FD' => false,
            'status_Ch5' => false,
            'confirmed' => false,
        ]);
        Toastr::success('Exit request submitted successfully.', 'Success');
        return redirect()->route('home')->with('success', 'Request submitted successfully!');
    }
    public function index()
    {
        $exitdemand = ExitDemand::all();
        return $exitdemand; // Update with your view name
    }
}
