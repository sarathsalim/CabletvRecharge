@extends('Layouts.AdminMaster')

@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="text-center mb-4">
            <h2 style="padding-top: 50px; font-weight: bold; color: #333;">Search Recharge Details</h2>
        </div>

        <!-- Search Form -->
        <form method="GET" action="{{ route('Admin.rechargesearch') }}" class="mb-4">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <input 
                        type="text" 
                        name="smartcardno" 
                        class="form-control" 
                        placeholder="Enter Smart Card Number" 
                        value="{{ request('smartcardno') }}"
                    >
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </div>
        </form>

        <div class="table-responsive pt-3">
            <table class="table table-striped table-hover" style="border-collapse: collapse; width: 100%;">
                <thead style="background-color: #f8f9fa; border-bottom: 1px solid #dee2e6;">
                    <tr>
                        <th style="padding: 12px; border-bottom: 1px solid #dee2e6;">#</th>
                        <th style="padding: 12px; border-bottom: 1px solid #dee2e6;">Customer Name</th>
                        <th style="padding: 12px; border-bottom: 1px solid #dee2e6;">Package Name</th>
                        <th style="padding: 12px; border-bottom: 1px solid #dee2e6;">Amount</th>
                        <th style="padding: 12px; border-bottom: 1px solid #dee2e6;">Recharge Date</th>
                        <th style="padding: 12px; border-bottom: 1px solid #dee2e6;">Package Due Date</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($recharges->isEmpty())
                        <tr>
                            <td colspan="7" class="text-center">No records found for the provided Smart Card Number.</td>
                        </tr>
                    @else
                        @foreach ($recharges as $index => $recharge)
                        <tr>
                            <td class="align-middle text-center" style="padding: 12px; border-bottom: 1px solid #f1f1f1;">{{ $index + 1 }}</td>
                            <td class="align-middle text-center" style="padding: 12px; border-bottom: 1px solid #f1f1f1;">
    {{ $recharge->customer ? $recharge->customer->name : 'N/A' }}
</td>
                            <td class="align-middle text-center" style="padding: 12px; border-bottom: 1px solid #f1f1f1;">
                                {{ $recharge->package ? $recharge->package->packagename : 'N/A' }}
                            </td>
                            <td class="align-middle text-center" style="padding: 12px; border-bottom: 1px solid #f1f1f1;">{{ $recharge->amount }}</td>
                            <td class="align-middle text-center" style="padding: 12px; border-bottom: 1px solid #f1f1f1;">{{ \Carbon\Carbon::parse($recharge->rechargedate)->format('d-m-Y') }}</td>
                            <td class="align-middle text-center" style="padding: 12px; border-bottom: 1px solid #f1f1f1;">{{ \Carbon\Carbon::parse($recharge->packageduedate)->format('d-m-Y') }}</td>
                        </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>

        @if(session('success'))
            <div class="alert alert-primary mt-4">
                {{ session('success') }}
            </div>
        @endif
    </div>
</div>
@endsection
