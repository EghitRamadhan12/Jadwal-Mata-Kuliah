<?php

namespace App\Repositories;

use App\Http\Requests\AuthRequest;
use App\Interfaces\AuthInterface;
use App\Models\user;
use App\Traits\HttpResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthRepositories implements AuthInterface
{
    use HttpResponseTrait;
    public function login(AuthRequest $request)
    {
        try {
            if(!Auth::attempt($request->only('email', 'password'))) {
                return response()->json([
                    'status' => 'failed',
                    'message' => 'Unauthorized'
                ], 401);
            }else{
                $user = user::where('email', $request->email)->first();
                $user->createToken('token')->plainTextToken;
                return response()->json([
                    'status' => 'success',
                    'message' => 'Login success',
                ]);
            }
        } catch (\Throwable $th) {
            return $this->error($th->getMessage());
        }
    }

    public function logout(Request $request)
    {
        try {
            $request->user('web')->tokens()->delete();
            Auth::guard('web')->logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return response()->json([
                'status' => 'success',
                'message' => 'Logout success',
            ]);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage());
        }
    }
}