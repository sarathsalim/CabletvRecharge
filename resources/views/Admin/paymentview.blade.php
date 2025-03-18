@extends('Layouts.AdminMaster')

@section('content')

<div class="content-wrapper">
    <div class="container-fluid">
        <div class="text-center mb-4">
            <h2 style="padding-top: 50px; font-weight: bold; color: #333;">View All Payments</h2>
        </div>

        <div class="table-responsive pt-3">
            <table class="table table-striped table-hover" style="border-collapse: collapse; width: 100%;">
                <thead style="background-color: #f8f9fa; border-bottom: 1px solid #dee2e6;">
                    <tr>
                        <th style="padding: 12px; border-bottom: 1px solid #dee2e6;">#</th>
                        <th style="padding: 12px; border-bottom: 1px solid #dee2e6;">Customer Name</th>
                        <th style="padding: 12px; border-bottom: 1px solid #dee2e6;">Recharge ID</th>
                        <th style="padding: 12px; border-bottom: 1px solid #dee2e6;">Smart Card No</th>
                        <th style="padding: 12px; border-bottom: 1px solid #dee2e6;">Package Name</th>
                        <th style="padding: 12px; border-bottom: 1px solid #dee2e6;">Amount</th>
                        <th style="padding: 12px; border-bottom: 1px solid #dee2e6;">Payment Date</th>
                        <th style="padding: 12px; border-bottom: 1px solid #dee2e6;">Status</th>
                        <th style="padding: 12px; border-bottom: 1px solid #dee2e6;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($payments as $index => $payment)
                    <tr>
                        <td class="align-middle text-center" style="padding: 12px; border-bottom: 1px solid #f1f1f1;">{{ $index + 1 }}</td>
                        <td class="align-middle text-center" style="padding: 12px; border-bottom: 1px solid #f1f1f1;">
                            {{ $payment->customer->name ?? 'N/A' }} <!-- Assuming 'customer' relationship is set -->
                        </td>
                        <td class="align-middle text-center" style="padding: 12px; border-bottom: 1px solid #f1f1f1;">{{ $payment->rechargeid }}</td>
                        <td class="align-middle text-center" style="padding: 12px; border-bottom: 1px solid #f1f1f1;">
                            {{ $payment->recharge->smartcardno }}
                        </td>
                        <td class="align-middle text-center" style="padding: 12px; border-bottom: 1px solid #f1f1f1;">
                            {{ $payment->recharge->package ? $payment->recharge->package->packagename : 'N/A' }}
                        </td>
                        <td class="align-middle text-center" style="padding: 12px; border-bottom: 1px solid #f1f1f1;">{{ $payment->amount }}</td>
                        <td class="align-middle text-center" style="padding: 12px; border-bottom: 1px solid #f1f1f1;">{{ \Carbon\Carbon::parse($payment->paydate)->format('d-m-Y') }}</td>
                        <td class="align-middle text-center" style="padding: 12px; border-bottom: 1px solid #f1f1f1;">
                            {{ $payment->status }}
                        </td>
                        <td class="align-middle text-center" style="padding: 12px; border-bottom: 1px solid #f1f1f1;">
                            <a href="{{ route('payments.editStatus', $payment->paymentid) }}" class="btn btn-primary">
                                Update Status
                            </a>
                        </td>
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
