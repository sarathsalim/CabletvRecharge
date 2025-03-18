<!DOCTYPE html>
<html>
<head>
    <title>Complaint Under Processing</title>
</head>
<body>
    <p>Dear {{ $complaint->customer->name }},</p>
    <p>Your complaint with ID <strong>{{ $complaint->complaintid }}</strong> is currently under processing.</p>
    <p>Details of your complaint:</p>
    <ul>
        <li>Smart Card No: {{ $complaint->smartcardno }}</li>
        <li>Complaint Date: {{ \Carbon\Carbon::parse($complaint->complaintdate)->format('d-m-Y') }}</li>
        <li>Description: {{ $complaint->complaint }}</li>
    </ul>
    <p>We will update you shortly on the status of your complaint.</p>
    <p>Thank you!</p>
</body>
</html>
