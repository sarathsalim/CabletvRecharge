@extends('Layouts.CustomerMaster')
@section('content')
<div class="container mt-5">
    <div class="card shadow-sm mx-auto" style="max-width: 600px;">
        <div class="card-header text-center bg-primary text-white">
            
            <h2>Recharge</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('recharge.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="smartcardno" class="form-label">Smart Card Number</label>
                    <input type="text" class="form-control" id="smartcardno	" name="smartcardno" value="{{ $customer->smartcardno}}" readonly>
                </div>

                <div class="mb-3">
                    <label for="customername" class="form-label">Customer Name</label>
                    <input type="text" class="form-control" id="customername" name="customername" value="{{ $customer->name }}" readonly>
                </div>

                <div class="mb-3">
                    <label for="package" class="form-label">Package</label>
                    <input type="text" class="form-control" id="package" name="package" value="{{ $package->packagename }}" readonly>
                    <input type="hidden" name="packageid" value="{{ $package->packageid }}">
                </div>

                <div class="mb-3">
                    <label for="rechargedate" class="form-label">Recharge Date</label>
                    <input type="date" class="form-control" id="rechargedate" name="rechargedate" value="{{ now()->format('Y-m-d') }}" readonly>
                </div>

                <div class="mb-3">
                    <label for="packageduedate" class="form-label">Package Due Date</label>
                    <input type="date" class="form-control" id="packageduedate" name="packageduedate" readonly>
                </div>



                <div class="mb-3">
                    <label for="amount" class="form-label">Amount</label>
                    <input type="text" class="form-control" id="amount" name="amount" value="{{ $package->amount }}" readonly>
                </div>
                <input type="hidden" name="customerid" value="{{ $customer->customerid }}">
                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-lg mt-3">Recharge</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const days = {{ $package->days }};
        const rechargeDate = new Date(document.getElementById('rechargedate').value);
        rechargeDate.setDate(rechargeDate.getDate() + days);
        document.getElementById('packageduedate').value = rechargeDate.toISOString().split('T')[0];
    });
</script>
@endsection
