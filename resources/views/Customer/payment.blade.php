@extends('Layouts.CustomerMaster')
@section('content')

<style>
    body {
        background-color: #e9ecef;
        font-family: Arial, sans-serif;
        margin: 0;
    }

    /* Payment Container */
    .payment-container {
        max-width: 450px; /* Adjusted width */
        width: 100%;
        background: #f7f8fa; /* Slightly lighter than white */
        padding: 20px; /* Reduced padding */
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.05); /* Lighter shadow */
        margin: 30px auto; /* Center alignment */
    }

    /* Titles */
    .payment-title {
        text-align: center;
        color: #333;
        margin-bottom: 20px;
        font-weight: bold;
    }

    .payment-subtitle {
        color: #666;
        font-size: 18px;
        margin-bottom: 15px;
        text-align: center;
    }

    /* Invoice Section */
    .payment-section {
        background-color: #fff;
        padding: 15px; /* Slightly reduced padding */
        border-radius: 6px;
        margin-bottom: 20px;
    }

    .invoice-detail {
        display: flex;
        justify-content: space-between;
        font-size: 16px;
        color: #555;
        margin-bottom: 10px;
    }

    /* Input Fields */
    .payment-input {
        width: 100%;
        padding: 8px; /* Reduced padding */
        margin-top: 10px;
        border: 1px solid #ced4da;
        border-radius: 5px;
        font-size: 15px; /* Slightly smaller font size */
        transition: border-color 0.2s;
    }

    .payment-input:focus {
        border-color: #007bff;
        outline: none;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.2);
    }

    /* Button Styles */
    .payment-button {
        width: 100%;
        padding: 10px; /* Reduced padding */
        background-color: #ffb700; /* Matching yellow from navbar */
        color: white;
        font-size: 15px; /* Adjusted font size */
        border: none;
        border-radius: 5px;
        cursor: pointer;
        margin-top: 15px;
        font-weight: 600;
        transition: background-color 0.3s;
    }

    .payment-button:hover {
        background-color: #e0a300; /* Darker yellow for hover */
    }

    /* Flex Row for Expiry and CVV */
    .input-flex-row {
        display: flex;
        gap: 10px;
        margin-top: 10px;
    }
</style>
<br><br><br><br><br><br>
<div class="payment-container">
    <h2 class="payment-title">Secure Payment</h2>

    <!-- Invoice Section -->
    <div class="payment-section">
        <h5 class="payment-subtitle">Invoice Details</h5>
        <div class="invoice-detail">
            <span>Payment Date:</span>
            <strong>{{ $paydate }}</strong>
        </div> 
        <div class="invoice-detail">
            <span>Amount Due:</span>
            <strong>₹{{ number_format($recharge->amount, 2) }}</strong>
        </div>
        <input type="hidden" name="amount" value="{{ $recharge->amount }}">
        <input type="hidden" name="status" value="Pending">
    </div>

    <!-- Payment Form -->
    <div class="payment-section">
        <h5 class="payment-subtitle">Debit Card Details</h5>
        <form action="{{ route('payment.process') }}" method="POST">
            @csrf
            <!-- Hidden fields for passing necessary data -->
            <input type="hidden" name="rechargeid" value="{{ $recharge->rechargeid }}">
            <input type="hidden" name="paydate" value="{{ $paydate }}">
            <input type="hidden" name="amount" value="{{ $recharge->amount }}">
            <input type="hidden" name="status" value="Pending">
            <input type="hidden" name="customerid" value="{{ $recharge->customerid }}">

            <!-- Card Information Fields -->
            <input type="text" class="payment-input" name="card_number" placeholder="Card Number" maxlength="16" required>
            <input type="text" class="payment-input" name="card_name" placeholder="Name on Card" required>
            
            <!-- Expiry and CVC Fields -->
            <div class="input-flex-row">
                <input type="text" class="payment-input" name="expiry_date" placeholder="MM / YY" maxlength="5" required>
                <input type="text" class="payment-input" name="cvc" placeholder="CVV" maxlength="3" required>
            </div>
            
            <!-- Submit Button -->
            <button class="payment-button" type="submit">Proceed to Payment</button>
        </form>
    </div>
</div>

@endsection
