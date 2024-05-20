<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        try {
            $fields = $request->validate([
                'name' => 'required|string',
                'email' => 'required|string|unique:users,email',
                'password' => 'required|string|confirmed',
                'phone' => 'required|string',
                'role' => 'required|string|in:staff,user,admin',
            ]);

            $user = User::create([
                'name' => $fields['name'],
                'email' => $fields['email'],
                'password' => bcrypt($fields['password']),
                'phone' => $fields['phone'],
                'role' => $fields['role'],
            ]);

            $token = $user->createToken('auth-token')->plainTextToken;

            return response()->json([
                'status' => 200,
                'token' => $token,
                'message' => 'User berhasil ditambahkan',
                'data' => $user,
            ]);
        } catch (ValidationException $e) {
            $errors = $e->validator->getMessageBag();

            return response()->json([
                'status' => 422,
                'message' => 'Validation failed',
                'errors' => $errors,
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => 'Error: ' . $e->getMessage(),
            ]);
        }
    }
    public function login(Request $request)
    {
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = User::where('email', $fields['email'])->first();

        if (!$user || !Hash::check($fields['password'], $user->password)) {
            return response(
                [
                    'message' => 'Email atau password salah',
                ],
                401,
            );
        }

        $token = $user->createToken('auth-token')->plainTextToken;

        $response = [
            'status' => 'success',
            'token' => $token,
            'message' => 'User berhasil ditambahkan',
            'user' => $user,
        ];

        return response($response, 200);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();


        return response()->json(
            [
                'status' => 'success',
                'message' => 'Berhasil logout',
            ],
            200,
        );
    }
}
