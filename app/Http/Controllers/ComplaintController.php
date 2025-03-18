<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Complaint;
use App\Models\Customer;
use App\Mail\ComplaintProcessingMail;
use Illuminate\Support\Facades\Mail;

class ComplaintController extends Controller
{
    public function showComplaintForm(Request $request)
    {
        $customerid = $request->session()->get('customerid');
        $customer = Customer::find($customerid);

        return view('Customer.submit', compact('customer', 'customerid'));
    }
    public function submitComplaint(Request $request)
    {
        $customerid = $request->session()->get('customerid');

        Complaint::create([
            'name' => $request->name,
            'smartcardno' => $request->smartcardno,
            'complaintdate' => $request->complaintdate,
            'complaint' => $request->complaint,
            'status' => 'Pending',
            'customerid' => $customerid,
        ]);

        return redirect()->route('complaint.confirmation');  
       }
    public function showConfirmation()
{
    return view('Customer.complaint_confirmation');
}

     public function viewComplaints()
     {
         // Retrieve only complaints with the status 'Pending'
         $complaints = Complaint::where('status', 'Pending')->get();
 
         return view('Admin.complaints', compact('complaints'));
     }
public function sendComplaintProcessingMail($complaintid)
{
    // Retrieve the complaint by ID
    $complaint = Complaint::findOrFail($complaintid);

    if ($complaint->customer) {
        // Update the complaint status to 'Processing'
        $complaint->status = 'Processing';
        $complaint->save();

        // Send the email
        $customerEmail = $complaint->customer->email;
        Mail::to($customerEmail)->send(new ComplaintProcessingMail($complaint));

        return redirect()->route('complaints.view')->with('status', 'Email sent successfully for Complaint ID ' . $complaintid);
    }

    return redirect()->route('complaints.view')->with('status', 'Customer email not found for Complaint ID ' . $complaintid);
}


    
}
