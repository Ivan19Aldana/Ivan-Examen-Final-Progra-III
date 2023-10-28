<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6',
        ],
            [
                'name.required' => 'El campo nombre es requerido.',
                'email.required' => 'El campo correo electrónico es requerido.',
                'email.email' => 'El correo electrónico debe ser una dirección de correo válida.',
                'email.unique' => 'Ya existe un usuario con este correo electrónico.',
                'password.required' => 'El campo contraseña es requerido.',
                'password.min' => 'La contraseña debe tener al menos 6 caracteres.',
            ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'No se pudo registrar, verifique los datos', 'errors' => $validator->errors()], 400);
        }

        $user = new \App\Models\User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        return response()->json(['message' => 'Usuario Registrado'], 201);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('authToken')->plainTextToken;
            return response()->json(['message' => 'Ingreso Validado', 'token' => $token], 200);
        } else {
            return response()->json(['message' => 'Error, Verifique los datos'], 401);
        }
    }
}
