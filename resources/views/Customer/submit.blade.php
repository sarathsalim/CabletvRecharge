@extends('Layouts.CustomerMaster')

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm mx-auto" style="max-width: 600px;">
        <h1 class="text-center mt-3">Submit a Complaint</h1>
        <form action="{{ route('complaint.submit') }}" method="POST" class="p-4">
            @csrf <!-- Include CSRF token for security -->

            <!-- Name Input -->
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" placeholder="Name" name="name" value="{{ $customer->name }}" required>
            </div>

            <!-- Smart Card Number Input -->
            <div class="form-group">
                <label for="smartcardno">Smart Card Number</label>
                <input type="text" class="form-control" placeholder="Smart Card Number" name="smartcardno" value="{{ $customer->smartcardno}}" required>
            </div>

            <!-- Complaint Date Input -->
            <div class="form-group">
                <label for="complaintdate">Complaint Date</label>
                <input type="date" class="form-control" name="complaintdate" value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" required>
            </div>

            <!-- Complaint Text Area -->
            <div class="form-group">
                <label for="complaint">Complaint</label>
                <textarea class="form-control" placeholder="Enter your complaint" rows="5" name="complaint" required></textarea>
            </div>

            <!-- Hidden Fields -->
            <input type="hidden" name="status" value="Pending">
            <input type="hidden" name="customerid" value="{{ $customer->customerid }}">

            <!-- Centered Submit Button -->
            <div class="text-center mt-4">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection
