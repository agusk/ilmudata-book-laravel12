<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AjaxFormController extends Controller
{
    public function showForm()
    {
        return view('ajax-form');
    }

    public function submitForm(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|min:5',
            'email' => 'required|email',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
            ], 422);
        }

        return response()->json([
            'message' => 'Form submitted successfully!',
        ]);
    }
}
