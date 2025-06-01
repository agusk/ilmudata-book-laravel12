<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Str;

class PrivateImageUploadController extends Controller
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

        $extension = $request->file('image')->getClientOriginalExtension();
        $filename = Str::uuid() . '.' . $extension;

        // Store in local (private) storage
        $path = $request->file('image')->storeAs('private-images', $filename, 'local');

        return redirect()->route('private.result')->with([
            'file_path' => $path,
            'file_name' => $validated['file_name'],
            'description' => $validated['description'],
        ]);
    }

    public function showResult()
    {
        if (!session()->has('file_path')) {
            return redirect()->route('private.form');
        }

        return view('result', [
            'file_path' => session('file_path'),
            'file_name' => session('file_name'),
            'description' => session('description'),
        ]);
    }

    public function viewImage($filename)
    {
        $path = 'private-images/' . $filename;

        if (!Storage::disk('local')->exists($path)) {
            abort(404);
        }

        $file = Storage::disk('local')->get($path);
        $mime = Storage::disk('local')->mimeType($path);

        return new Response($file, 200, ['Content-Type' => $mime]);
    }
}
