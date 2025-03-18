<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recharge;
use App\Models\Payment;
use App\Models\Customer;
use App\Mail\PaymentCompletedMail;
use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\Facade\PDF;

class PaymentController extends Controller
{
    public function showPaymentForm($rechargeid)
    {
        $recharge = Recharge::findOrFail($rechargeid);
        $paydate = now()->toDateString();

        return view('Customer.payment', compact('recharge', 'paydate'));
    }

    public function processPayment(Request $request)
    {
        Payment::create([
            'rechargeid' => $request->rechargeid,
            'paydate' => $request->paydate,
            'amount' => $request->amount,
            'status' => $request->status,
            'customerid' => $request->customerid,
        ]);

        return redirect()->route('paymentsuccess.success'); 
    }

    public function paymentSuccess()
    {
        // Pass necessary data to the view, like the recharge ID, to generate the invoice
        $recharge = Recharge::latest()->first(); // Get the most recent recharge record
        return view('Customer.paymentsuccess', compact('recharge'));
    }

    public function downloadInvoice($rechargeid)
    {
        $recharge = Recharge::findOrFail($rechargeid); 
        $paydate = now()->toDateString(); 

        
        $data = [
            'recharge' => $recharge,
            'paydate' => $paydate,
        ];

        $pdf = PDF::loadView('Customer.invoicepdf', $data);
        return $pdf->download('invoice_' . $rechargeid . '.pdf');
    }

    public function updateStatus(Request $request, $paymentid)
{
    $payment = Payment::findOrFail($paymentid);

    // Check if payment has a recharge
    if (!$payment->recharge) {
        return redirect()->route('payments.view')->with('error', 'Recharge not found for this payment');
    }

    // Retrieve the recharge and customer
    $recharge = $payment->recharge;
    $customer = $recharge->customer;

    if (!$customer) {
        return redirect()->route('payments.view')->with('error', 'Customer not found for this recharge');
    }

    // Update status and send email if completed
    $payment->update(['status' => $request->status]);

    if ($request->status == 'completed') {
        $packagename = $recharge->package->packagename ?? 'N/A';
        $amount = $payment->amount;
        $days = $recharge->package->days ?? 'N/A';

        Mail::to($customer->email)->send(new PaymentCompletedMail($packagename, $amount, $days));
    }

    return redirect()->route('payments.view')->with('success', 'Payment status updated successfully');
}


    public function viewPayments()
    {
        $payments = Payment::with(['recharge.package'])->get();
        return view('admin.paymentview', compact('payments'));
    }
    public function editStatus($paymentid)
    {
        $payment = Payment::findOrFail($paymentid);
        return view('admin.editStatus', compact('payment'));
    }
}
