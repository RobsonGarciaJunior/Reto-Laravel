<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\API\Parser;
use Illuminate\Http\Response;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'departmentId' => 'required|integer|exists:departments,id',
        ]);
      //  if ($validatedData->fails()){
      //      return response()->json([
      //          'message' => ['Entra en el validador datos invalidos'],
      //      ])->setStatusCode(Response::HTTP_UNAUTHORIZED);
      //  }
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'departmentId' => $validatedData['departmentId'],
        ]);
        return response()->json([
            'name' => $user->name,
            'email' => $user->email,
            'departmentId' => $user->departmentId
        ])->setStatusCode(Response::HTTP_CREATED);
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'device_name' => 'required',
        ]);
        
        $user = User::where('email', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => ['Username or password incorrect'],
            ])->setStatusCode(Response::HTTP_UNAUTHORIZED);
        }
        // FIXME: queremos dejar más dispositivos?
        //$user->tokens()->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'User logged in successfully',
            'name' => $user->name,
            'token' => $user->createToken($request->device_name)
                ->plainTextToken,
        ]);
    }
    public function logout(Request $request){
        $request->user()->currentAccessToken()->delete();
        return response()->json([
        'status' => 'success',
        'message' => 'User logged out successfully'
        ])->setStatusCode(Response::HTTP_OK);
    }
}
