<!DOCTYPE html>
<html>
<head>
    <title>Order Report</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>User Order Summary</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>User</th>
                <th>Total Orders</th>
                <th>Total Spent ($)</th>
            </tr>
        </thead>
        <tbody>
        @foreach($reports as $report)
            <tr>
                <td>{{ $report->user_name }}</td>
                <td>{{ $report->total_orders }}</td>
                <td>{{ number_format($report->total_spent, 2) }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>