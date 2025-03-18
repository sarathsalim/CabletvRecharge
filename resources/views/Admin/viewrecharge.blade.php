@extends('Layouts.AdminMaster')

@section('content')

<div class="content-wrapper">
    <div class="container-fluid">
        <div class="text-center mb-4">
            <h2 style="padding-top: 50px; font-weight: bold; color: #333;">View All Recharges</h2>
        </div>

        <!-- Filter Form -->
        <form method="GET" action="{{ route('Admin.rechargeview') }}" class="mb-4">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <select name="year" class="form-control">
                        <option value="">Select Year</option>
                        @foreach(range(date('Y'), 2000) as $year)
                            <option value="{{ $year }}" {{ request('year') == $year ? 'selected' : '' }}>
                                {{ $year }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <select name="month" class="form-control">
                        <option value="">Select Month</option>
                        @foreach(range(1, 12) as $month)
                            <option value="{{ $month }}" {{ request('month') == $month ? 'selected' : '' }}>
                                {{ date('F', mktime(0, 0, 0, $month, 1)) }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary">Filter</button>
                </div>
            </div>
        </form>

        <div class="table-responsive pt-3">
            <table class="table table-striped table-hover" style="border-collapse: collapse; width: 100%;">
                <thead style="background-color: #f8f9fa; border-bottom: 1px solid #dee2e6;">
                    <tr>
                        <th style="padding: 12px; border-bottom: 1px solid #dee2e6;">#</th>
                        <th style="padding: 12px; border-bottom: 1px solid #dee2e6;">Smart Card No</th>
                        <th style="padding: 12px; border-bottom: 1px solid #dee2e6;">Package Name</th>
                        <th style="padding: 12px; border-bottom: 1px solid #dee2e6;">Amount</th>
                        <th style="padding: 12px; border-bottom: 1px solid #dee2e6;">Recharge Date</th>
                        <th style="padding: 12px; border-bottom: 1px solid #dee2e6;">Package Due Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($recharges as $index => $recharge)
                    <tr>
                        <td class="align-middle text-center" style="padding: 12px; border-bottom: 1px solid #f1f1f1;">{{ $index + 1 }}</td>
                        <td class="align-middle text-center" style="padding: 12px; border-bottom: 1px solid #f1f1f1;">{{ $recharge->smartcardno }}</td>
                        <td class="align-middle text-center" style="padding: 12px; border-bottom: 1px solid #f1f1f1;">
                            {{ $recharge->package ? $recharge->package->packagename : 'N/A' }}
                        </td>
                        <td class="align-middle text-center" style="padding: 12px; border-bottom: 1px solid #f1f1f1;">{{ $recharge->amount }}</td>
                        <td class="align-middle text-center" style="padding: 12px; border-bottom: 1px solid #f1f1f1;">{{ \Carbon\Carbon::parse($recharge->rechargedate)->format('d-m-Y') }}</td>
                        <td class="align-middle text-center" style="padding: 12px; border-bottom: 1px solid #f1f1f1;">{{ \Carbon\Carbon::parse($recharge->packageduedate)->format('d-m-Y') }}</td>
                    </tr>
                    @endforeach
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
