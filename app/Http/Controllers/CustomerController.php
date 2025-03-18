<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Package;
use App\Models\Complaint;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function customer_register(Request $request)
    {
        return view('Guest.customerreg');
    }
    public function customer_insert(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email|max:255',
            'contactno' => 'required|numeric|digits:10',
            'aadharno' => 'required|numeric|digits:12|unique:customers,aadharno',
            'username' => 'required|string|max:50|unique:customers,username',
            'password' => 'required|min:8',
            'smartcardno' => 'required|numeric|unique:customers,smartcardno',
            'enddate' => 'required|date|after:today',
        ]);
        $name = $validatedData['name'];
        $email = $validatedData['email'];
        $contactno = $validatedData['contactno'];
        $aadharno = $validatedData['aadharno'];
        $username = $validatedData['username'];
        $password = $validatedData['password']; 
        $smartcardno = $validatedData['smartcardno'];
        $enddate = $validatedData['enddate'];
        Customer::create([
            'name' => $name,
            'email' => $email,
            'contactno' => $contactno,
            'aadharno' => $aadharno,
            'status' => 1,
            'username' => $username,
            'password' => $password,
            'smartcardno' => $smartcardno,
            'enddate' => $enddate,
        ]);

        return redirect()->route('customerlogin')->with('success', 'Customer registered successfully.');
    }
    public function customerhome(Request $request)
{
    $packages = Package::all();
    $customerId = $request->session()->get('customerid');
    $customer = Customer::with('package') 
                        ->where('customerid', $customerId)
                        ->first();
    $expiryMessage = '';
    if ($customer && $customer->enddate) {
        $endDate = \Carbon\Carbon::parse($customer->enddate);
        $remainingDays = $endDate->diffInDays(now());
        $expiryMessage = "Your current package  expires in $remainingDays days.";
    }

    return view('Customer.Customerhome', compact('packages', 'expiryMessage'));
}

    
public function guesthome()
{
    // Fetch all packages
    $packages = Package::all();

    return view('Guest.guesthome', compact('packages'));
}
    public function complaint_register(Request $request)
    {   
       
        Complaint::create([
            'name' => $request->name, 
            'smartcardno' => $request->smartcardno,
            'complaintdate' => $request->complaintdate,
            'complaint' => $request->complaint,
        ]);

        return redirect()->route('Customer.customerhome')->with('success', 'Complaint registered successfully.');
    }
    
    
} 
