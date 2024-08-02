<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class CertificateController extends Controller
{
    public function create()
    {
        return view('certificate.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|string|max:255',
            'issued_for' => 'required|string|max:255',
            'salary' => 'required|numeric',
            'department' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Certificate::create([
            'user_id' => $request->user_id,
            'type' => $request->type,
            'issued_for' => $request->issued_for,
            'salary' => $request->salary,
            'department' => $request->department,
            'description' => $request->description,
            'confirmed' => false,
            'status_MD' => false,
            'status_HD' => false,
            'status_FD' => false,
            'status_Ch5' => false,
        ]);

        Toastr::success('Certificate request submitted successfully.', 'Success');
        return redirect()->route('home')->with('success', 'Certificate request submitted successfully!');
    }

    public function index()
    {
        $certificates = Certificate::all();
        return $certificates;
    }
}
