@extends('admin.layouts.app')

@php $edit = $pengguna->exists; @endphp

@section('title', $edit ? 'Ubah Akun' : 'Tambah Akun')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">{{ $edit ? 'Ubah Akun' : 'Tambah Akun' }}</h4>

                    <form method="POST" action="{{ $edit ? route('pengguna.update', $pengguna) : route('pengguna.store') }}">
                        @csrf
                        @if ($edit)
                            @method('PUT')
                        @endif

                        <div class="mb-3">
                            <label class="form-label" for="name">Nama <span class="text-danger">*</span></label>
                            <input type="text" id="name" name="name" maxlength="100" required
                                class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name', $pengguna->name) }}">
                            @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="email">Email <span class="text-danger">*</span></label>
                            <input type="email" id="email" name="email" maxlength="255" required
                                class="form-control @error('email') is-invalid @enderror"
                                value="{{ old('email', $pengguna->email) }}">
                            @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="role">Peran <span class="text-danger">*</span></label>
                            <select id="role" name="role" class="form-select @error('role') is-invalid @enderror">
                                @foreach ($peran as $kode => $label)
                                    <option value="{{ $kode }}" @selected(old('role', $pengguna->role) === $kode)>{{ $label }}</option>
                                @endforeach
                            </select>
                            @error('role') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <hr class="my-4">
                        @if ($edit)
                            <p class="text-muted mb-3">Kosongkan password jika tidak ingin menggantinya.</p>
                        @endif

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="password">
                                    {{ $edit ? 'Password baru' : 'Password' }} (min. 8 karakter)
                                    @unless ($edit) <span class="text-danger">*</span> @endunless
                                </label>
                                <input type="password" id="password" name="password" autocomplete="new-password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    @unless ($edit) required @endunless>
                                @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="password_confirmation">Ulangi password</label>
                                <input type="password" id="password_confirmation" name="password_confirmation"
                                    autocomplete="new-password" class="form-control">
                            </div>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">{{ $edit ? 'Simpan perubahan' : 'Simpan' }}</button>
                            <a href="{{ route('pengguna.index') }}" class="btn btn-outline-secondary">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection