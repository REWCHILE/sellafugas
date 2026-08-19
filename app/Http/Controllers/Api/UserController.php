<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * List all technicians and administrators.
     */
    public function index(Request $request)
    {
        $user = $request->user();
        if (! $user->isAdmin()) {
            return response()->json([
                'success' => false,
                'message' => 'Acceso denegado. Solo administradores pueden gestionar usuarios.',
            ], 403);
        }

        $users = User::latest()->get()->map(function ($u) {
            return [
                'id' => $u->id,
                'name' => $u->name,
                'email' => $u->email,
                'role' => $u->role,
                'phone' => $u->phone,
                'rut' => $u->rut,
                'sec_code' => $u->sec_code,
                'is_active' => (bool)$u->is_active,
                'certificates_count' => $u->certificates()->count(),
                'created_at' => $u->created_at?->format('d/m/Y H:i'),
            ];
        });

        return response()->json([
            'success' => true,
            'users' => $users,
        ]);
    }

    /**
     * Create a new technician or administrator.
     */
    public function store(Request $request)
    {
        $user = $request->user();
        if (! $user->isAdmin()) {
            return response()->json([
                'success' => false,
                'message' => 'Acceso denegado.',
            ], 403);
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'role' => 'required|in:admin,technician',
            'phone' => 'nullable|string|max:100',
            'rut' => 'nullable|string|max:100',
            'sec_code' => 'nullable|string|max:255',
        ]);

        $newUser = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'phone' => $request->phone,
            'rut' => $request->rut,
            'sec_code' => $request->sec_code,
            'is_active' => true,
        ]);

        return response()->json([
            'success' => true,
            'message' => "Usuario / Técnico '{$newUser->name}' creado exitosamente.",
            'user' => [
                'id' => $newUser->id,
                'name' => $newUser->name,
                'email' => $newUser->email,
                'role' => $newUser->role,
                'phone' => $newUser->phone,
                'rut' => $newUser->rut,
                'sec_code' => $newUser->sec_code,
                'is_active' => (bool)$newUser->is_active,
            ],
        ], 201);
    }

    /**
     * Show single user details.
     */
    public function show(Request $request, $id)
    {
        $user = $request->user();
        if (! $user->isAdmin()) {
            return response()->json([
                'success' => false,
                'message' => 'Acceso denegado.',
            ], 403);
        }

        $u = User::findOrFail($id);

        return response()->json([
            'success' => true,
            'user' => [
                'id' => $u->id,
                'name' => $u->name,
                'email' => $u->email,
                'role' => $u->role,
                'phone' => $u->phone,
                'rut' => $u->rut,
                'sec_code' => $u->sec_code,
                'is_active' => (bool)$u->is_active,
                'certificates_count' => $u->certificates()->count(),
                'created_at' => $u->created_at?->format('d/m/Y H:i'),
            ],
        ]);
    }

    /**
     * Update an existing user/technician.
     */
    public function update(Request $request, $id)
    {
        $user = $request->user();
        if (! $user->isAdmin()) {
            return response()->json([
                'success' => false,
                'message' => 'Acceso denegado.',
            ], 403);
        }

        $targetUser = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $targetUser->id,
            'role' => 'required|in:admin,technician',
            'phone' => 'nullable|string|max:100',
            'rut' => 'nullable|string|max:100',
            'sec_code' => 'nullable|string|max:255',
            'is_active' => 'required|boolean',
            'password' => 'nullable|string|min:6',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'phone' => $request->phone,
            'rut' => $request->rut,
            'sec_code' => $request->sec_code,
            'is_active' => $request->is_active,
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $targetUser->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Usuario actualizado correctamente.',
            'user' => [
                'id' => $targetUser->id,
                'name' => $targetUser->name,
                'email' => $targetUser->email,
                'role' => $targetUser->role,
                'phone' => $targetUser->phone,
                'rut' => $targetUser->rut,
                'sec_code' => $targetUser->sec_code,
                'is_active' => (bool)$targetUser->is_active,
            ],
        ]);
    }

    /**
     * Delete a technician/user.
     */
    public function destroy(Request $request, $id)
    {
        $user = $request->user();
        if (! $user->isAdmin()) {
            return response()->json([
                'success' => false,
                'message' => 'Acceso denegado.',
            ], 403);
        }

        if (intval($id) === $user->id) {
            return response()->json([
                'success' => false,
                'message' => 'No puede eliminar su propia cuenta de administrador.',
            ], 422);
        }

        $targetUser = User::findOrFail($id);
        $name = $targetUser->name;
        $targetUser->delete();

        return response()->json([
            'success' => true,
            'message' => "Usuario '{$name}' eliminado correctamente.",
        ]);
    }
}
