@extends('Layouts.AdminMaster')

@section('content')

<div class="content-wrapper">
    <div class="container-fluid">
        <div class="text-center mb-4">
            <h2 style="padding-top: 50px; font-weight: bold; color: #333;">Update Payment Status</h2>
        </div>

        <form action="{{ route('payments.updateStatus', $payment->paymentid) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control">
                    <option value="pending" {{ $payment->status == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="completed" {{ $payment->status == 'completed' ? 'selected' : '' }}>Completed</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Update Status</button>
        </form>
    </div>
</div>

@endsection
