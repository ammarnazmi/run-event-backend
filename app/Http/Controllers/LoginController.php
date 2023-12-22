<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\model\Admin;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function __invoke(LoginRequest $loginRequest)
    {
        $admin = Admin::where([
            'email' => $loginRequest->email
        ])->first();

        if (!$admin || !Hash::check($loginRequest->password, $admin->password)) {
            return response()->json([
                'message' => 'invalid email or password'
            ], 200);
        }

        $token = $admin->createToken('Authentication')->plainTextToken;

        return response()->json([
            'message' => 'successfully login',
            'token' => $token
        ], 200);
    }
}
