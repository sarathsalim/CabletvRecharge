@extends('Layouts.CustomerMaster')
@section('content')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Success</title>
    <style>
        /* Centering Container */
        .success-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 40px;
            background-color: #f7f8fa;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        /* Title Styling */
        .success-title {
            font-size: 28px;
            color: #28a745; /* Green for success */
            margin-bottom: 20px;
            font-weight: bold;
        }

        /* Message Styling */
        .success-message {
            font-size: 18px;
            color: #555;
            line-height: 1.6;
            margin-bottom: 30px;
        }

        /* Return Button */
        .return-button {
            display: inline-block;
            padding: 12px 25px;
            font-size: 16px;
            color: white;
            background-color: #007bff; /* Blue for the button */
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .return-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<br><br><br><br>
<div class="success-container">
    <h2 class="success-title">Payment Successful</h2>
    <p class="success-message">Thank you for your payment. Your transaction has been completed successfully. You will receive an email confirmation shortly.</p>
    <a href="{{ route('invoice.download', $recharge->rechargeid) }}" class="return-button">Download Invoice</a>
</div>

@endsection
