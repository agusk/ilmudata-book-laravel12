<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index()
    {
        $reports = DB::table('orders')
            ->join('users', 'orders.user_id', '=', 'users.id')
            ->join('products', 'orders.product_id', '=', 'products.id')
            ->select(
                'users.name as user_name',
                DB::raw('SUM(orders.quantity * products.price) as total_spent'),
                DB::raw('COUNT(orders.id) as total_orders')
            )
            ->groupBy('users.name')
            ->orderByDesc('total_spent')
            ->get();

        return view('reports.index', compact('reports'));
    }
}
