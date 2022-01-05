<?php

namespace App\Http\Controllers\api\v1\auth;

use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    use ApiResponser;

    public function login(Request $request)
    {

        $attr = $request->validate([
            'email' => 'required|string|email|',
            'password' => 'required|string|min:6'
        ]);

        if (Auth::guard('systemUser')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return $this->success([
                'tokens' => auth()->guard('systemUser')->user()->createToken('API Token')->plainTextToken
            ]);
        }

        return $this->error('Credentials not match', 401);
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'Tokens Revoked'
        ];
    }
}
