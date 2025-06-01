<!DOCTYPE html>
<html>
<head>
    <title>Employee Bonus Report</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Employee Bonus Report</h2>

    <form method="GET" class="row g-3 mb-4">
        <div class="col-md-4">
            <label for="min_years" class="form-label">Minimum Years of Service</label>
            <input type="number" name="min_years" value="{{ $minYears }}" class="form-control" />
        </div>
        <div class="col-md-4">
            <label for="sort" class="form-label">Sort By</label>
            <select name="sort" class="form-select">
                <option value="bonus DESC" {{ $sort == 'bonus DESC' ? 'selected' : '' }}>Bonus High to Low</option>
                <option value="bonus ASC" {{ $sort == 'bonus ASC' ? 'selected' : '' }}>Bonus Low to High</option>
                <option value="name ASC" {{ $sort == 'name ASC' ? 'selected' : '' }}>Name A-Z</option>
                <option value="name DESC" {{ $sort == 'name DESC' ? 'selected' : '' }}>Name Z-A</option>
            </select>
        </div>
        <div class="col-md-4 d-flex align-items-end">
            <button type="submit" class="btn btn-primary">Filter</button>
        </div>
    </form>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Salary ($)</th>
                <th>Years of Service</th>
                <th>Bonus ($)</th>
            </tr>
        </thead>
        <tbody>
        @foreach($employees as $emp)
            <tr>
                <td>{{ $emp->name }}</td>
                <td>{{ number_format($emp->salary, 2) }}</td>
                <td>{{ $emp->years_of_service }}</td>
                <td>{{ number_format($emp->bonus, 2) }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>