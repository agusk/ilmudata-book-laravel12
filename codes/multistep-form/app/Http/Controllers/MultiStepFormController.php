<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MultiStepFormController extends Controller
{
    public function step1()
    {
        return view('form.step1');
    }

    public function storeStep1(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email',
        ]);

        session([
            'form.name' => $request->name,
            'form.email' => $request->email,
        ]);

        return redirect()->route('form.step2');
    }

    public function step2()
    {
        return view('form.step2');
    }

    public function storeStep2(Request $request)
    {
        $request->validate([
            'age' => 'required|numeric|min:18',
            'bio' => 'required|string|min:10',
        ]);

        session([
            'form.age' => $request->age,
            'form.bio' => $request->bio,
        ]);

        return redirect()->route('form.summary');
    }

    public function summary()
    {
        $data = session('form');
        return view('form.summary', compact('data'));
    }
}
