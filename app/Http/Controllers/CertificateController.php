<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Log;
use PDF;
use App\Models\User;

class CertificateController extends Controller
{
    public function create()
    {
        return view('certificate.create');
    }

    // public function generateCertificate($id)
    // {

    //     $data = [
    //         'title' => 'Laravel PDF Example',
    //         'date' => date('m/d/Y'),
    //     ];

    //     $pdf = PDF::loadView('certificates.template', $data);

    //     return $pdf->download('document.pdf');  
    // }
    
    public function generateCertificate($id)
    {
        // Fetch the certificate record by its ID
        $certificate = Certificate::find($id);
    
        // Check if the certificate exists
        if (!$certificate) {
            return abort(404, 'Certificate not found');
        }
    
        // Fetch the user associated with the certificate
        $user = $certificate->user;
    
        // Prepare data for the PDF view
        $data = [
            'title' => 'Certificate of Excellence',
            'user_name' => $user->name, // Assuming the User model has a 'name' attribute
        ];
    
        // Load the view with the data and generate the PDF
        $pdf = PDF::loadView('certificates.template', $data);
    
        // Return the generated PDF for download
        return $pdf->download('certificate_'.$user->name.'.pdf');  
    }
    
    public function updateStatus($id)
    {
        $certificate = Certificate::findOrFail($id);
        $certificate->confirmed = !$certificate->confirmed;
        $certificate->save();
        Toastr::success('Certificate status updated and generated successfully!', 'Success');
        return redirect()->back()->with('status', 'Certificate status updated and generated successfully');
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
