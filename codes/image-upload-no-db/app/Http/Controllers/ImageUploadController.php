<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ImageUploadController extends Controller
{
    public function showForm()
    {
        return view('upload');
    }

    public function handleUpload(Request $request)
    {
        $validated = $request->validate([
            'file_name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $filename = Str::uuid() . '.' . $request->file('image')->getClientOriginalExtension();
        $path = $request->file('image')->storeAs('uploads', $filename, 'public');

        return redirect()->route('upload.result')->with([
            'file_path' => $path,
            'file_name' => $validated['file_name'],
            'description' => $validated['description'],
        ]);
    }

    public function showResult()
    {
        if (!session()->has('file_path')) {
            return redirect()->route('upload.form');
        }

        return view('result', [
            'file_path' => session('file_path'),
            'file_name' => session('file_name'),
            'description' => session('description'),
        ]);
    }
}
