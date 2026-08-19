<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Authenticate user and issue Sanctum token.
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
            'device_name' => 'nullable|string',
        ]);

        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            return response()->json([
                'success' => false,
                'message' => 'Credenciales inválidas. Por favor verifique su correo y contraseña.',
            ], 422);
        }

        if (! $user->is_active) {
            return response()->json([
                'success' => false,
                'message' => 'Su cuenta se encuentra desactivada. Contacte al Administrador.',
            ], 403);
        }

        $deviceName = $request->input('device_name', 'Mobile App');
        $token = $user->createToken($deviceName)->plainTextToken;

        return response()->json([
            'success' => true,
            'message' => 'Inicio de sesión exitoso',
            'token' => $token,
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'role' => $user->role,
                'is_admin' => $user->isAdmin(),
                'phone' => $user->phone,
                'rut' => $user->rut,
                'sec_code' => $user->sec_code,
                'is_active' => $user->is_active,
            ],
        ]);
    }

    /**
     * Revoke current token.
     */
    public function logout(Request $request)
    {
        $user = $request->user();
        if ($user && $user->currentAccessToken()) {
            $user->currentAccessToken()->delete();
        }

        return response()->json([
            'success' => true,
            'message' => 'Sesión cerrada correctamente',
        ]);
    }

    /**
     * Get authenticated user profile data.
     */
    public function me(Request $request)
    {
        $user = $request->user();

        return response()->json([
            'success' => true,
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'role' => $user->role,
                'is_admin' => $user->isAdmin(),
                'phone' => $user->phone,
                'rut' => $user->rut,
                'sec_code' => $user->sec_code,
                'is_active' => $user->is_active,
                'created_at' => $user->created_at?->toIso8601String(),
            ],
        ]);
    }

    /**
     * Update authenticated user profile.
     */
    public function updateProfile(Request $request)
    {
        $user = $request->user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:100',
            'rut' => 'nullable|string|max:100',
            'sec_code' => 'nullable|string|max:255',
            'password' => 'nullable|string|min:6',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'rut' => $request->rut,
            'sec_code' => $request->sec_code,
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Perfil actualizado exitosamente',
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'role' => $user->role,
                'is_admin' => $user->isAdmin(),
                'phone' => $user->phone,
                'rut' => $user->rut,
                'sec_code' => $user->sec_code,
                'is_active' => $user->is_active,
            ],
        ]);
    }
}
