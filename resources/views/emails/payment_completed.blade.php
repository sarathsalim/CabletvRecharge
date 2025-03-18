<!DOCTYPE html>
<html>
<head>
    <title>Payment Completed</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
            line-height: 1.6;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        h1 {
            color: #4CAF50;
        }
        p {
            font-size: 16px;
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Your Payment for the Package "{{ $packagename }}" has been Completed</h1>
        <p><strong>Amount:</strong> ${{ $amount }}</p>
        <p><strong>Duration:</strong> {{ $days }} days</p>
        <p>Thank you for choosing our service!</p>
    </div>
</body>
</html>

