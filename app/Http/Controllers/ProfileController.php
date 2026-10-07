<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{
    public function edit(Request $request)
    {
        return view('admin.profile.edit', ['user' => $request->user()]);
    }

    public function update(Request $request)
    {
        $user = $request->user();

        $data = $request->validate([
            'name'             => ['required', 'string', 'max:100'],
            'email'            => ['required', 'email', 'max:255', Rule::unique('users', 'email')->ignore($user->id)],
            'current_password' => ['required_with:password', 'nullable', 'current_password'],
            'password'         => ['nullable', 'confirmed', Password::min(8)],
        ], [
            'name.required'                  => 'Nama harus diisi',
            'email.required'                 => 'Email harus diisi',
            'email.email'                    => 'Format email tidak valid',
            'email.unique'                   => 'Email sudah dipakai akun lain',
            'current_password.required_with' => 'Password saat ini harus diisi untuk mengganti password',
            'current_password.current_password' => 'Password saat ini salah',
            'password.confirmed'             => 'Konfirmasi password baru tidak cocok',
            'password.min'                   => 'Password baru minimal 8 karakter',
        ]);

        $user->name  = $data['name'];
        $user->email = $data['email'];

        if (! empty($data['password'])) {
            $user->password = $data['password']; // di-hash otomatis oleh cast "hashed"
        }

        $user->save();

        return redirect()->route('profile.edit')->with('success', 'Profil berhasil diperbarui.');
    }

    public function tema(Request $request)
    {
        $data = $request->validate(['theme' => ['required', Rule::in(['light', 'dark'])]]);

        $request->user()->update(['theme' => $data['theme']]);

        return response()->json(['success' => true]);
    }
}
