@extends('Layouts.AdminMaster')

@section('content')
<div class="container">
    <h2 style="text-align: center; color: #4a90e2;">Date Range Report</h2>

    <p style="text-align: center; font-size: 16px; color: #555; margin-top: 20px;">
        This report provides data for the selected date range, including the recharge count for each package. It consists of two main components:
    </p>
    <ul style="text-align: center; font-size: 16px; color: #555; list-style-type: none; padding: 0;">
        <li><strong>Package Name:</strong> The name of the recharge package.</li>
        <li><strong>Recharge Count:</strong> The number of times the package was recharged within the selected date range.</li>
        <li><strong>Action:</strong> A link to view further details for each package's recharge activity.</li>
    </ul>
    <p style="text-align: center; font-size: 16px; color: #555;">
        This helps in analyzing the recharge trends for the specified period and making informed business decisions.
    </p>

    <form method="GET" action="{{ route('dateRangeReport') }}" style="margin: 20px auto; text-align: center;">
        <label for="from_date" style="margin-right: 10px;">From:</label>
        <input type="date" name="from_date" value="{{ old('from_date', $fromDate ?? '') }}" required style="padding: 8px; margin-right: 15px;">
        <label for="to_date" style="margin-right: 10px;">To:</label>
        <input type="date" name="to_date" value="{{ old('to_date', $toDate ?? '') }}" required style="padding: 8px; margin-right: 15px;">
        <button type="submit" style="padding: 10px 15px; background-color: #4a90e2; color: white; border: none; border-radius: 5px;">Submit</button>
    </form>

    @if (!empty($fromDate) && !empty($toDate))
        @if ($reportData->isNotEmpty())
            <table class="table table-bordered mt-3" style="width: 90%; margin: 20px auto; border-collapse: collapse;">
                <thead>
                    <tr style="background-color: #4a90e2; color: white;">
                        <th style="padding: 12px;">Package Name</th>
                        <th style="padding: 12px;">Recharge Count</th>
                        <th style="padding: 12px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reportData as $data)
                    <tr>
                        <td style="padding: 12px;">{{ $data->package->packagename }}</td>
                        <td style="padding: 12px; text-align: center;">{{ $data->count }}</td>
                        <td style="padding: 12px; text-align: center;">
                            <a href="{{ route('customerList', [$data->packageid, $fromDate, $toDate]) }}" style="color: #4a90e2; text-decoration: none;">View Details</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p style="text-align: center; color: #333;">No data found for the selected date range.</p>
        @endif
    @endif
</div>
@endsection
