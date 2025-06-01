<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MinioImageUploadController extends Controller
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
        $path = Storage::disk('s3')->putFileAs(
            '',                                 // folder in bucket
            $request->file('image'),            // uploaded file
            $filename,                          // new file name
            ['visibility' => 'public',          // set visibility here
            'disk' => 's3']
        );

        // Manually construct public URL
        $bucket = config('filesystems.disks.s3.bucket');
        $endpoint = rtrim(config('filesystems.disks.s3.endpoint'), '/');
        $publicUrl = "{$endpoint}/{$bucket}/{$path}";

        return redirect()->route('upload.result')->with([
            'file_url' => $publicUrl,
            'file_name' => $validated['file_name'],
            'description' => $validated['description'],
        ]);
    }

    public function showResult()
    {
        if (!session()->has('file_url')) {
            return redirect()->route('upload.form');
        }

        return view('result', [
            'file_url' => session('file_url'),
            'file_name' => session('file_name'),
            'description' => session('description'),
        ]);
    }
}
