<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    /**
     * Create a new class instance.
     */
    public function login($request)
    {
        $credentials['email'] = $request->email;
        $credentials['password'] = $request->password;

        $user = User::where('email', $credentials['email'])->first();

        if(!$user || !Hash::check($credentials['password'], $user->password)){
        return handleError(null, 'Invalid Credentials.');
        } else {
            $token = $user->createToken($user->id)->plainTextToken;
            return handleSuccess($token, 'Login Success');
        }
    }
}
