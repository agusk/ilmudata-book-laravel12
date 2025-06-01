<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CarController extends Controller
{
    public function index()
    {
        $cars = DB::table('cars')->get();
        return view('cars.index', compact('cars'));
    }

    public function create()
    {
        return view('cars.create');
    }

    public function store(Request $request)
    {
        DB::table('cars')->insert([
            'brand' => $request->brand,
            'model' => $request->model,
            'year' => $request->year,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect()->route('cars.index')->with('success', 'Car added!');
    }

    public function edit($id)
    {
        $car = DB::table('cars')->where('id', $id)->first();
        return view('cars.edit', compact('car'));
    }

    public function update(Request $request, $id)
    {
        DB::table('cars')->where('id', $id)->update([
            'brand' => $request->brand,
            'model' => $request->model,
            'year' => $request->year,
            'updated_at' => now(),
        ]);
        return redirect()->route('cars.index')->with('success', 'Car updated!');
    }

    public function destroy($id)
    {
        DB::table('cars')->where('id', $id)->delete();
        return redirect()->route('cars.index')->with('success', 'Car deleted!');
    }
}
