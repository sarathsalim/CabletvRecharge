@extends('Layouts.CustomerMaster')

@section('content')
<div class="container mt-5">
<div class="card shadow-sm mx-auto" style="max-width: 600px;">

    <!-- Title Section -->
    <div class="text-center mb-4">
        <h2 class="display-6 fw-bold text-primary">Recharge History</h2>
        <p class="text-muted">View details of your past recharge transactions</p>
    </div>
    
    <!-- Card Section -->
    <div class="card shadow-sm border-0">
        <div class="card-body p-4">
            <div class="table-responsive">
                <table class="table table-hover table-striped align-middle text-center">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>Recharge ID</th>
                            <th>Package Name</th>
                            <th>Amount</th>
                            <th>Recharge Date</th>
                            <th>Package Due Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($recharges as $recharge)
                        <tr>
                            <td>{{ $recharge->rechargeid }}</td>
                            <td>{{ $recharge->package->packagename }}</td>
                            <td>₹{{ number_format($recharge->amount, 2) }}</td>
                            <td>{{ \Carbon\Carbon::parse($recharge->rechargedate)->format('d M, Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($recharge->packageduedate)->format('d M, Y') }}</td>
                        </tr>
                        @endforeach

                        @if($recharges->isEmpty())
                        <tr>
                            <td colspan="5" class="text-center text-muted py-3">
                                No recharge history available.
                            </td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
