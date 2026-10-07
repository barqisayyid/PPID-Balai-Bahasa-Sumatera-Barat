@extends('admin.layouts.app')

@section('title', 'Profil Saya')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-1">Profil Saya</h4>
                    <p class="text-muted mb-4">Ubah nama, email, atau password akun Anda.</p>

                    <form method="POST" action="{{ route('profile.update') }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label" for="name">Nama</label>
                            <input type="text" id="name" name="name" class="form-control"
                                value="{{ old('name', $user->name) }}" required maxlength="100">
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control"
                                value="{{ old('email', $user->email) }}" required maxlength="255">
                        </div>

                        <hr class="my-4">
                        <p class="text-muted mb-3">Kosongkan bagian ini jika tidak ingin mengganti password.</p>

                        <div class="mb-3">
                            <label class="form-label" for="current_password">Password saat ini</label>
                            <input type="password" id="current_password" name="current_password" class="form-control"
                                autocomplete="current-password">
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="password">Password baru (min. 8 karakter)</label>
                                <input type="password" id="password" name="password" class="form-control"
                                    autocomplete="new-password">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="password_confirmation">Ulangi password baru</label>
                                <input type="password" id="password_confirmation" name="password_confirmation"
                                    class="form-control" autocomplete="new-password">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan perubahan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
