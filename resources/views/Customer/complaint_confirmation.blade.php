@extends('Layouts.CustomerMaster')

@section('content')
<div class="container mt-5 text-center">
    <h1 class="text-success">Complaint Submitted Successfully!</h1>
    <p>Thank you for submitting your complaint. We will review it and get back to you shortly.</p>
    <a href="{{ route('Customer.customerhome') }}" class="btn btn-primary mt-3">Go to Dashboard</a>
</div>
@endsection
