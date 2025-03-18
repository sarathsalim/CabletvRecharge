@extends('Layouts.AdminMaster')

@section('content')
<div class="container">
    <h2 class="text-center mb-4" style="color: #4a90e2;">Customer Recharge Details</h2>

    @foreach ($customers->groupBy('package.packagename') as $packageName => $recharges)
        <div class="mb-4">
            <h3 style="color: #4a90e2;">{{ $packageName }} (₹{{ number_format($recharges->first()->package->amount, 2) }})</h3>
            
            <table class="table table-hover table-bordered" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); background-color: #fff;">
                <thead style="background-color: #4a90e2; color: white;">
                    <tr>
                        <th style="text-align: center;">Customer Name</th>
                        <th style="text-align: center;">Recharge Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($recharges as $recharge)
                    <tr>
                        <td style="text-align: center;">{{ $recharge->customer->name }}</td>
                        <td style="text-align: center;">{{ date('d-m-Y', strtotime($recharge->rechargedate)) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endforeach
</div>
@endsection
