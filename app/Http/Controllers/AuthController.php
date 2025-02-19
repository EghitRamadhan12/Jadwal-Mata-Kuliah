<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Repositories\AuthRepositories;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $authRepositories;

    public function __construct(AuthRepositories $authRepositories)
    {
        $this->authRepositories  = $authRepositories;
    }

    public function login(AuthRequest $request)
    {
        return $this->authRepositories->login($request);    
    }

    public function logout(Request $request)
    {
        return $this->authRepositories->logout($request);
    }
}
