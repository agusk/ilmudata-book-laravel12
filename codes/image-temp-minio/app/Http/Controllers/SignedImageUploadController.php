<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SignedImageUploadController extends Controller
{
    public function showForm()
    {
        return view('upload_signed');
    }

    public function generateSignedUpload(Request $request)
    {
        $validated = $request->validate([
            'file_name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
        ]);

        $filename = Str::slug($validated['file_name']) . '-' . time() . '.png';
        $path = $filename;

        // Generate pre-signed PUT URL
        $client = Storage::disk('s3')->getClient();
        $bucket = config('filesystems.disks.s3.bucket');
        $command = $client->getCommand('PutObject', [
            'Bucket' => $bucket,
            'Key' => $path,
            'ContentType' => 'image/png'
        ]);
        $requestUrl = (string) $client->createPresignedRequest($command, '+5 minutes')->getUri();

        session()->put([
            'file_name' => $validated['file_name'],
            'description' => $validated['description'],
            'filename' => $filename
        ]);

        return response()->json([
            'upload_url' => $requestUrl
        ]);
    }

    public function showResult()
    {
        $filename = session('filename');

        if (!$filename) {
            return redirect()->route('signed.form');
        }

        $url = Storage::disk('s3')->temporaryUrl(
            $filename,
            now()->addMinutes(5)
        );

        return view('result_signed', [
            'file_name' => session('file_name'),
            'description' => session('description'),
            'image_url' => $url,
        ]);
    }
}
