<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Log;
use PDF;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        $user = User::find($certificate->user_id);

        // Check if the user exists
        if (!$user) {
            return abort(404, 'User not found');
        }
        
        // Fetch the user associated with the certificate
    
        // Prepare data for the PDF view
        $data = [
            'title' => 'Certificate of Excellence',
            'user_name' => $user->name, // Assuming the User model has a 'name' attribute
        ];
    
        // Load the view with the data and generate the PDF
        $pdf = PDF::loadView('certificates.template', $data);
        $user1 = Auth::User();
        $activityLog = [
            'user_name'    => $user1->name,
            'email'        => $user1->email,
            'phone_number' => $user1->phone,
            'status'       => $user1->status,
            'role_name'    => $user1->role_name,
            'modify_user'  => 'Downloaded a Certificate',
            'date_time'    => now()->toDayDateTimeString(),
        ];
        DB::table('user_activity_logs')->insert($activityLog);

        // Return the generated PDF for download
        return $pdf->download('certificate_'.$user->name.'.pdf');  

    }
    
    public function updateStatus($id)
    {
        $certificate = Certificate::findOrFail($id);
        $certificate->confirmed = !$certificate->confirmed;
        $certificate->save();
        if ($certificate->confirmed) {
            $user = User::find($certificate->user_id);
            
            if ($user) {
                Mail::send('emails.certificate_accepted', ['user' => $user, 'certificate' => $certificate], function($message) use ($user) {
                    $message->from('it.yasmine@houdahotelstunisia.com');
                    $message->to($user->email);
                    $message->subject('Your Certificate Demand Has Been Accepted');
                });
                Log::info('Email sent to user', ['email' => $user->email]);
            } else {
                Log::warning('User not found for certificate', ['user_id' => $certificate->user_id]);
            }

        }
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
        ]);
        $user = Auth::User();
        $activityLog = [
            'user_name'    => $user->name,
            'email'        => $user->email,
            'phone_number' => $user->phone,
            'status'       => $user->status,
            'role_name'    => $user->role_name,
            'modify_user'  => 'Created a Certificate Demand',
            'date_time'    => now()->toDayDateTimeString(),
        ];
        DB::table('user_activity_logs')->insert($activityLog);

        Toastr::success('Certificate request submitted successfully.', 'Success');
        return redirect()->route('certificate.index')->with('success', 'Certificate request submitted successfully!');
    }

    // public function index()
    // {
    //     $user = Auth::user(); // Get the currently authenticated user

    //     if ($user->role_name === 'Employee') {
    //         // If the user is an Employee, get only their own advances
    //         $certificates = Certificate::where('user_id', $user->id)->get();
    //     } else {
    //         // If the user has any other role, get all advances
    //         $certificates = Certificate::all();
    //     }       
    //     return view('settings.certificatedemand', compact('certificates'));
    // }
    public function index()
    {
        $user = Auth::user();
    
        $certificates = Certificate::where('user_id', $user->id)->with('user')->get();

        return view('settings.certificatedemand', compact('certificates'));
}
public function index2()
{
    $user = Auth::user();
    if ($user->role_name === 'Manager director' || $user->role_name === 'Financial director') {
        // Fetch all advances without filtering by department
        $certificates = Certificate::all();
    } else {
    $certificates = Certificate::whereHas('user', function($query) use ($user) {
        $query->where('department', $user->department);
    })
    ->with('user') // Ensure that the user relationship is also loaded
    ->get();
    }

    return view('settings.certificatedemand2', compact('certificates'));
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
        $user = Auth::User();
        $activityLog = [
            'user_name'    => $user->name,
            'email'        => $user->email,
            'phone_number' => $user->phone,
            'status'       => $user->status,
            'role_name'    => $user->role_name,
            'modify_user'  => 'Updated a Certificate Demand',
            'date_time'    => now()->toDayDateTimeString(),
        ];
        DB::table('user_activity_logs')->insert($activityLog);

        Toastr::success('Certificate updated successfully.', 'Success');
        return redirect()->route('certificate.index')->with('success', 'Certificate updated successfully!');
    }

    public function destroy($id)
    {
        $certificate = Certificate::findOrFail($id);
        $certificate->delete();
        $user = Auth::User();
        $activityLog = [
            'user_name'    => $user->name,
            'email'        => $user->email,
            'phone_number' => $user->phone,
            'status'       => $user->status,
            'role_name'    => $user->role_name,
            'modify_user'  => 'Deleted a Certificate Demand',
            'date_time'    => now()->toDayDateTimeString(),
        ];
        DB::table('user_activity_logs')->insert($activityLog);

        Toastr::success('Certificate deleted successfully.', 'Success');
        return redirect()->route('certificate.index')->with('success', 'Certificate deleted successfully!');
    }
}
