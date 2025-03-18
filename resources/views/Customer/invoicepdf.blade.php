<!DOCTYPE html>
<html>
<head>
    <title>Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
        }
        .table th, .table td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        .table th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Invoice</h1>
        <p>Recharge ID: {{ $recharge->id }}</p>
    </div>
    <table class="table">
        <tr>
            <th>Customer Name</th>
            <td>{{ $recharge->customer->name }}</td>
        </tr>
        <tr>
            <th>Smart Card Number</th>
            <td>{{ $recharge->customer->smartcardno }}</td>
        </tr>
        <tr>
            <th>Package</th>
            <td>{{ $recharge->package->packagename }}</td>
        </tr>
        <tr>
            <th>Amount</th>
            <td>{{ $recharge->amount }}</td>
        </tr>
        <tr>
            <th>Recharge Date</th>
            <td>{{ $paydate }}</td>
        </tr>
        <tr>
            <th>Package Due Date</th>
            <td>{{ $recharge->packageduedate }}</td>
        </tr>
    </table>
</body>
</html>
