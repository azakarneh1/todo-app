<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\Auth\AuthResource;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email|string',
            'password' => 'required|string',
        ]);

        $auth = auth()->attempt([
            'email' => $request->email,
            'password' => $request->password
        ]);

        if (!$auth) {
            return response()->json(['message' => 'unauthenticated']);
        }

        return response()->json([
            'status' => 'success',
            'data' => new AuthResource(auth()->user())
        ], 200);
    }

    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();
        return response()->json(['message' => 'User logged out successfully']);
    }
}
