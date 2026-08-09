<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate(15);
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6'],
            'role' => ['required', 'in:admin,technician'],
            'phone' => ['nullable', 'string', 'max:100'],
            'rut' => ['nullable', 'string', 'max:100'],
            'sec_code' => ['nullable', 'string', 'max:255'],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'phone' => $request->phone,
            'rut' => $request->rut,
            'sec_code' => $request->sec_code,
            'is_active' => true,
        ]);

        return redirect()->route('users.index')
            ->with('success', 'Usuario / Técnico creado exitosamente.');
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'role' => ['required', 'in:admin,technician'],
            'phone' => ['nullable', 'string', 'max:100'],
            'rut' => ['nullable', 'string', 'max:100'],
            'sec_code' => ['nullable', 'string', 'max:255'],
            'is_active' => ['required', 'boolean'],
            'password' => ['nullable', 'string', 'min:6'],
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

        $user->update($data);

        return redirect()->route('users.index')
            ->with('success', 'Usuario actualizado correctamente.');
    }

    public function destroy(User $user)
    {
        if ($user->id === auth()->id()) {
            return back()->withErrors(['error' => 'No puede eliminar su propia cuenta de administrador.']);
        }

        $user->delete();

        return redirect()->route('users.index')
            ->with('success', 'Usuario eliminado.');
    }
}
