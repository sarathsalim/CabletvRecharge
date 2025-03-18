@extends('Layouts.AdminMaster')

@section('content')
<!DOCTYPE html>
<html>

<head>
    <title>Revenue Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 20px;
        }

        h1, h2, h3 {
            text-align: center;
            color: #4a90e2;
        }

        /* Form styling */
        form {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            margin: 20px auto;
            padding: 10px;
        }

        input[type="number"],
        select {
            padding: 8px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #fff;
        }

        button {
            padding: 10px 15px;
            background-color: #4a90e2;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #357abd;
        }

        /* Table styling */
        table {
            width: 90%;
            margin: 20px auto;
            border-collapse: collapse;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #4a90e2;
            color: #fff;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>

<body>
    <br>
    <h2>Revenue Report</h2>
    
    <p style="text-align: justify; font-size: 16px; color: #555; margin-top: 20px;">
    This revenue report displays the total revenue for a selected month and year. The report includes two key sections:
</p>
<ul style="text-align: justify; font-size: 16px; color: #555;">
    <li><strong>Monthly Revenue:</strong> The total earnings for the selected month and year in Indian Rupees (₹).</li>
    <li><strong>Yearly Revenue:</strong> A summary of total revenue for each year, providing an overview of business performance over time.</li>
</ul>


    <form method="GET" action="{{ route('revenueReport') }}">
        <input type="text" name="year" placeholder="Year" value="{{ old('year', $year ?? date('Y')) }}" required>
        <select name="month" required>
            <option value="" disabled selected>Select Month</option>
            @foreach ([
                1 => 'January',
                2 => 'February',
                3 => 'March',
                4 => 'April',
                5 => 'May',
                6 => 'June',
                7 => 'July',
                8 => 'August',
                9 => 'September',
                10 => 'October',
                11 => 'November',
                12 => 'December'
            ] as $value => $name)
                <option value="{{ $value }}" {{ old('month', $month) == $value ? 'selected' : '' }}>
                    {{ $name }}
                </option>
            @endforeach
        </select>
        <button type="submit">Submit</button>
    </form>

    @if ($monthlyRevenue)
        <h3>Monthly Revenue: ₹{{ number_format($monthlyRevenue, 2) }}</h3>
    @endif

    @if ($yearlyRevenue->isNotEmpty())
        <table>
            <thead>
                <tr>
                    <th>Year</th>
                    <th>Total Revenue</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($yearlyRevenue as $year)
                <tr>
                    <td>{{ $year->year }}</td>
                    <td>₹{{ number_format($year->revenue, 2) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p style="text-align: center;">No revenue data found for the selected criteria.</p>
    @endif
</body>

</html>
@endsection
