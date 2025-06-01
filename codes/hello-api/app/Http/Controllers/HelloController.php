<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class HelloController extends Controller
{
    // GET: Return a welcome message with timestamp
    public function getMessage(): JsonResponse
    {
        return response()->json([
            'message' => 'Hello World from GET!',
            'timestamp' => now()->toDateTimeString()
        ], 200);
    }

    // POST: Accept input and return a message
    public function postMessage(Request $request): JsonResponse
    {
        $name = $request->input('name', 'Guest');

        return response()->json([
            'message' => "Hello, $name! This is a POST request.",
            'timestamp' => now()->toDateTimeString()
        ], 201);
    }

    // PUT: Update a message
    public function putMessage(Request $request): JsonResponse
    {
        return response()->json([
            'message' => 'Hello World has been updated via PUT!',
            'timestamp' => now()->toDateTimeString()
        ], 200);
    }

    // DELETE: Delete a message
    public function deleteMessage(): JsonResponse
    {
        return response()->json([
            'message' => 'Hello World has been deleted!',
            'timestamp' => now()->toDateTimeString()
        ], 200);
    }
}
