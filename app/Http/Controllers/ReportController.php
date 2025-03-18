<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\Recharge;
use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    // Pie Chart Report: Package-wise Customer Count
    public function packageCustomerReport()
    {
        $data = Package::withCount('recharges')->get();
        return view('Report.packageCustomerReport', compact('data'));
    }

    // Date Range Report: Customer Recharges
    public function dateRangeReport(Request $request)
{
    $fromDate = $request->input('from_date');
    $toDate = $request->input('to_date');
    $reportData = Recharge::with('package')
        ->select('packageid', DB::raw('COUNT(*) as count'))
        ->whereBetween('rechargedate', [$fromDate, $toDate])
        ->groupBy('packageid')
        ->get();

    return view('Report.daterangereport', compact('reportData', 'fromDate', 'toDate'));
}

public function customerList($packageid, $fromDate, $toDate)
{
    $customers = Recharge::where('packageid', $packageid)
    ->whereBetween('rechargedate', [$fromDate, $toDate])
    ->with(['customer', 'package'])
    ->get();

return view('Report.customerlist', compact('customers', 'packageid', 'fromDate', 'toDate'));

}


    // Revenue Report
    public function revenueReport(Request $request)
    {
        $month = $request->input('month');
        $year = $request->input('year');

        $monthlyRevenue = Payment::whereYear('paydate', $year)
            ->whereMonth('paydate', $month)
            ->sum('amount');

        $yearlyRevenue = Payment::selectRaw('YEAR(paydate) as year, SUM(amount) as revenue')
            ->groupBy('year')
            ->get();

        return view('Report.revenueReport', compact('monthlyRevenue', 'yearlyRevenue', 'month', 'year'));
    }
}
