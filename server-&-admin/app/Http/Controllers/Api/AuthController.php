<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLoginRequest;
use App\Http\Requests\StoreRegisterRequest;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    public function register(StoreRegisterRequest $request)
    {
        $user = Customer::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        $token = JWTAuth::fromUser($user);

        return response()->json(compact('user', 'token'), 201);
    }

    public function login(StoreLoginRequest $request)
    {
        $credential = $request->only('email', 'password');

        if (!$token = auth()->guard('api')->attempt($credential)) {
            return response()->json([
                'message' => 'Email or Password is incorrect'
            ], 401);
        } else {
            return response()->json([
                'user' => auth()->guard('api')->user(),
                'token' => $token
            ], 201);
        }
    }

    public function getUser()
    {
        return response()->json(auth()->user());
    }

    public function logout()
    {
        JWTAuth::invalidate(JWTAuth::getToken());
        return response()->noContent();
    }

    public function changePassword(Request $request)
    {
        // Authenticate the customer
        $customer = auth()->guard('api')->user();

        // Validate the request data
        $validator = Validator::make($request->all(), [
            'current_password' => 'required',
            'new_password' => 'required|min:6',
            'confirm_password' => 'required|same:new_password',
        ]);

        // Check if the validation fails
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Check if the current password matches
        if (!Hash::check($request->current_password, $customer->password)) {
            return response()->json(['errors' => ['current_password' => ['Incorrect password']]], 422);
        }

        // Update the customer's password
        $customer->password = bcrypt($request->new_password);
        $customer->save();

        return response()->json(['message' => 'Password changed successfully']);
    }
}
