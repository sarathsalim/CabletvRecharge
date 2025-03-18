<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\Customer;
use App\Models\Recharge; 

class RechargeController extends Controller
{
    public function create(Request $request, $packageid)
{
    $customerid = $request->session()->get('customerid');
    $customer = Customer::find($customerid);
    $package = Package::find($packageid); 
    return view('Customer.recharge', compact('package', 'customer'));
}

public function store(Request $request)
{
    $customerid = $request->session()->get('customerid');  

    $recharge=Recharge::create([
        'smartcardno' => $request->smartcardno,
        'packageid' => $request->packageid,
        'amount' => $request->amount,
        'rechargedate' => $request->rechargedate,
        'packageduedate' => $request->packageduedate,
        'customerid' => $request->customerid,
        
    ]);
    $customer = Customer::find($customerid);
    if ($customer) {
        $customer->enddate = $request->packageduedate;
        $customer->save();
    }

    // Redirect or return a response
    return redirect()->route('Customer.payment',['rechargeid' => $recharge->rechargeid]);
}
public function rechargeview(Request $request)
{
    $query = Recharge::query();

    if ($request->has('year') && $request->year) {
        $query->whereYear('rechargedate', $request->year);
    }

    if ($request->has('month') && $request->month) {
        $query->whereMonth('rechargedate', $request->month);
    } else {
        // Show current month data by default
        $query->whereMonth('rechargedate', date('m'))->whereYear('rechargedate', date('Y'));
    }

    $recharges = $query->orderBy('rechargedate', 'desc')->get();

    return view('Admin.viewrecharge', compact('recharges'));
}

        public function history()
{
    $customerid = session()->get('customerid');
    $recharges = Recharge::where('customerid', $customerid)->orderBy('rechargedate', 'desc')->get();
    
    return view('Customer.recharge_history', compact('recharges'));
}
public function searchRecharges(Request $request)
{
    $query = Recharge::query();

    if ($request->has('smartcardno') && $request->smartcardno) {
        $query->where('smartcardno', $request->smartcardno);
    }

    $recharges = Recharge::with(['customer', 'package'])
    ->where('smartcardno', $request->smartcardno)
    ->get();

    return view('Admin.rechargesearch', compact('recharges'));
}

}
