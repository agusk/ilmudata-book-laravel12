<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Submission;
use Illuminate\Support\Facades\Storage;

class SubmissionController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'file' => 'required|file|max:5120', // max 5MB
        ]);

        // Store the file
        $filePath = $request->file('file')->store('uploads', 'public');

        // Save the submission
        $submission = Submission::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'file_path' => $filePath,
        ]);

        return response()->json([
            'message' => 'File uploaded successfully.',
            'data' => $submission
        ], 201);
    }
}
