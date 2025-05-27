<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;


class AuthController extends Controller
{
public function register(Request $request) {
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:users',
        'password' => 'required|min:8'
    ]);
if ($validator->fails()){
    return response()->json($validator->errors(), 422);
}
$user = User::create([
    'name' => $request->name,
    'email' => $request->email,
    'password' => bcrypt($request->password)
]);

if($user) {
    return response()->json([
        'success' => true,
        'message' => 'User created successfully',
        'data' => $user
    ], 201);
}
return response()->json([
    'succes' => false,
    'message' => 'User creaton failed'
], 409);
}
    public function login(Request $request) {
    $validator = Validator::make($request->all(), [
        'email' => 'required|email',
        'password' => 'required'
    ]);
    if ($validator->fails()){
    return response()->json($validator->errors(), 422);
}
    $credentials = $request->only('email', 'password');
    if (!$token = auth()->guard('api')->attempt($credentials)) {
            return response()->json([
                'success' => false,
                'message' => 'Email atau password salah'
            ], 401);
    }
    return response()->json([
        'success' => true,
        'message' => 'Login Success',
        'user' => auth()->guard('api')->user(),
        'token' => $token,
    ], 200);
  }

  public function logout(Request $request){
    try {
        JWTAuth::invalidate(JWTAuth::getToken());
        return response()->json([
            'success' => true,
            'message' => "Logout Success"
        ], 200);

    } catch(JWTEcxeption $e){
        return response()->json([
            'success' => false,
            'message' => 'Logout Failed'
        ], 500);
    }
  }
}