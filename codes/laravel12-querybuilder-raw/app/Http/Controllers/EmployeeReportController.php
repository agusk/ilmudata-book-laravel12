<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeReportController extends Controller
{
    public function index(Request $request)
    {
        $minYears = $request->input('min_years', 0);
        $sort = $request->input('sort', 'bonus DESC');

        // Sanitize allowed sort options
        $allowedSorts = ['bonus DESC', 'bonus ASC', 'name ASC', 'name DESC'];
        if (!in_array($sort, $allowedSorts)) {
            $sort = 'bonus DESC';
        }

        $employees = DB::table('employees')
            ->select(
                'name',
                'salary',
                'years_of_service',
                DB::raw('salary * years_of_service * 0.1 AS bonus')
            )
            ->whereRaw('years_of_service >= ?', [$minYears])
            ->orderByRaw($sort)
            ->get();

        return view('reports.employees', compact('employees', 'minYears', 'sort'));
    }
}
