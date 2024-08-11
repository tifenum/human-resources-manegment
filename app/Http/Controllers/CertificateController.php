<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Log;

class CertificateController extends Controller
{
    public function create()
    {
        return view('certificate.create');
    }
    public function updateStatus(Request $request, $id)
    {
        // Find the holiday record by ID
        $holiday = Certificate::findOrFail($id);
    
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
            $holiday->confirmed = true;
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
        return redirect()->route('certificate.index')->with('success', 'Certificate request submitted successfully!');
    }

    public function index()
    {
        $certificates = Certificate::all();
        return view('settings.certificatedemand', compact('certificates'));
    }

    public function edit($id)
    {
        $certificate = Certificate::findOrFail($id);
        return view('certificate.edit', compact('certificate'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'type' => 'required|string|max:255',
            'issued_for' => 'required|string|max:255',
            'salary' => 'required|numeric',
            'department' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $certificate = Certificate::findOrFail($id);
        $certificate->update([
            'type' => $request->type,
            'issued_for' => $request->issued_for,
            'salary' => $request->salary,
            'department' => $request->department,
            'description' => $request->description,
            'confirmed' => $request->confirmed ?? $certificate->confirmed,
            'status_MD' => $request->status_MD ?? $certificate->status_MD,
            'status_HD' => $request->status_HD ?? $certificate->status_HD,
            'status_FD' => $request->status_FD ?? $certificate->status_FD,
            'status_Ch5' => $request->status_Ch5 ?? $certificate->status_Ch5,
        ]);

        Toastr::success('Certificate updated successfully.', 'Success');
        return redirect()->route('certificate.index')->with('success', 'Certificate updated successfully!');
    }

    public function destroy($id)
    {
        $certificate = Certificate::findOrFail($id);
        $certificate->delete();

        Toastr::success('Certificate deleted successfully.', 'Success');
        return redirect()->route('certificate.index')->with('success', 'Certificate deleted successfully!');
    }
}
