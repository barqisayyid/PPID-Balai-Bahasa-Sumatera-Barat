<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use App\Models\ActivityLog;

/**
 * Kelola akun petugas (khusus admin; dibatasi di routes/web.php lewat middleware "role:admin").
 */
class UserController extends Controller
{
    public const PERAN = [
        'admin'    => 'Admin (akses penuh, termasuk kelola pengguna dan hapus dokumen)',
        'operator' => 'Operator (kelola dokumen dan tanggapi layanan)',
    ];

    public function index()
    {
        return view('admin.pengguna.index', ['daftar' => User::orderBy('name')->paginate(15)]);
    }

    public function create()
    {
        return view('admin.pengguna.form', ['pengguna' => new User(['role' => 'operator']), 'peran' => self::PERAN]);
    }

        public function store(Request $request)
    {
        $data = $request->validate($this->aturan(), $this->pesan());

        $user = User::create($data);

        ActivityLog::catat(
            aksi       : 'create',
            model      : $user,
            keterangan : "Akun petugas baru: {$user->name} ({$user->email})",
        );

        return redirect()->route('pengguna.index')->with('success', 'Akun berhasil ditambahkan.');
    }

    public function edit(User $user)
    {
        return view('admin.pengguna.form', ['pengguna' => $user, 'peran' => self::PERAN]);
    }

        public function update(Request $request, User $user)
    {
        $data = $request->validate($this->aturan($user), $this->pesan());

        // Jangan sampai sistem tidak punya admin sama sekali
        if ($user->isAdmin() && $data['role'] !== 'admin' && $this->adminTerakhir($user)) {
            return back()->withInput()->withErrors(['role' => 'Tidak bisa menurunkan peran: ini satu-satunya akun admin.']);
        }

        if (blank($data['password'] ?? null)) {
            unset($data['password']);
        }

        $user->update($data);

        ActivityLog::catat(
            aksi       : 'update',
            model      : $user,
            keterangan : "Akun petugas diperbarui: {$user->name} ({$user->email})",
        );

        return redirect()->route('pengguna.index')->with('success', 'Akun berhasil diperbarui.');
    }

        public function destroy(Request $request, User $user)
    {
        if ($user->is($request->user())) {
            return back()->with('error', 'Anda tidak bisa menghapus akun yang sedang dipakai.');
        }

        if ($user->isAdmin() && $this->adminTerakhir($user)) {
            return back()->with('error', 'Tidak bisa menghapus: ini satu-satunya akun admin.');
        }

        ActivityLog::catat(
            aksi       : 'delete',
            model      : $user,
            keterangan : "Akun petugas dihapus: {$user->name} ({$user->email})",
        );

        $user->delete();

        return redirect()->route('pengguna.index')->with('success', 'Akun berhasil dihapus.');
    }
    // ------------------------------------------------------------------

    private function aturan(?User $user = null): array
    {
        return [
            'name'     => ['required', 'string', 'max:100'],
            'email'    => ['required', 'email', 'max:255', Rule::unique('users', 'email')->ignore($user?->id)],
            'role'     => ['required', Rule::in(array_keys(self::PERAN))],
            'password' => [$user ? 'nullable' : 'required', 'confirmed', Password::min(8)],
        ];
    }

    private function pesan(): array
    {
        return [
            'name.required'      => 'Nama harus diisi.',
            'email.required'     => 'Email harus diisi.',
            'email.email'        => 'Format email tidak valid.',
            'email.unique'       => 'Email sudah dipakai akun lain.',
            'role.required'      => 'Peran harus dipilih.',
            'role.in'            => 'Peran tidak valid.',
            'password.required'  => 'Password harus diisi.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
            'password.min'       => 'Password minimal 8 karakter.',
        ];
    }

    private function adminTerakhir(User $user): bool
    {
        return User::where('role', 'admin')->where('id', '!=', $user->id)->doesntExist();
    }
}