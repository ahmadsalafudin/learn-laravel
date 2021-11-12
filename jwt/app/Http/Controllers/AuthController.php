<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $token_validity = 24 * 60;
        $this->guard()->factory()->setTTL($token_validity);
        if (!$token = $this->guard()->attempt($validator->validated())) {
            return response()->json(['error' => 'Unauthorized', 401]);
        }
        return $this->responseWithToken($token);
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|between:2,100',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $user = User::create([
            $validator->validated(),
            ['password' => bcrypt($request->passsword)]
        ]);
        return response()->json(['message' => 'User created succesfully', 'user' => $user]);
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();
        return response()->json(['message' => 'User logout succesfully']);
    }

    public function profile()
    {
        return response()->json($this->guard()->user());
    }

    public function refresh(Request $request)
    {
        return $this->responseWithToken($this->guard()->refresh());
    }

    protected function responseWithToken($token)
    {
        return response()->json([
            'token' => $token,
            'token_type' => 'bearer',
            'token_validity' => $this->guard()->factory()->getTTL() * 60
        ]);
    }

    protected function guard()
    {
        return Auth::guard();
    }
}
