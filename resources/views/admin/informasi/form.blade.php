@extends('admin.layouts.app')

@php
    $edit       = $informasi->exists;
    $pakaiJenis = in_array('jenis_informasi', $fields);
    $pakaiPj    = in_array('pj', $fields);
@endphp

@section('title', ($edit ? 'Ubah' : 'Tambah') . ' Dokumen - ' . $label)

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-1">{{ $edit ? 'Ubah Dokumen' : 'Tambah Dokumen' }}</h4>
                    <p class="text-muted mb-4">{{ $label }}</p>

                                        <form method="POST" enctype="multipart/form-data"
                        action="{{ $edit
                            ? route('informasi.update', ['kategori' => $kategori, 'informasi' => $informasi])
                            : route('informasi.store', $kategori) }}">
                        @csrf
                        @if ($edit)
                            @method('PUT')
                        @endif

                        <div class="mb-3">
                            <label class="form-label" for="nama">Nama dokumen <span class="text-danger">*</span></label>
                            <textarea id="nama" name="nama" rows="2" maxlength="500" required
                                class="form-control @error('nama') is-invalid @enderror">{{ old('nama', $informasi->nama) }}</textarea>
                            @error('nama') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        @if ($pakaiJenis)
                            <div class="mb-3">
                                <label class="form-label" for="jenis_informasi">{{ $labelJenis }}</label>
                                <input type="text" id="jenis_informasi" name="jenis_informasi" maxlength="100"
                                    list="saran-jenis" autocomplete="off"
                                    class="form-control @error('jenis_informasi') is-invalid @enderror"
                                    value="{{ old('jenis_informasi', $informasi->jenis_informasi) }}">
                                <datalist id="saran-jenis">
                                    @foreach ($saran['jenis_informasi'] as $s)
                                        <option value="{{ $s }}">
                                    @endforeach
                                </datalist>
                                @error('jenis_informasi') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        @endif

                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label" for="tahun">Tahun <span class="text-danger">*</span></label>
                                <input type="text" id="tahun" name="tahun" maxlength="20" required
                                    placeholder="2025"
                                    class="form-control @error('tahun') is-invalid @enderror"
                                    value="{{ old('tahun', $informasi->tahun) }}">
                                @error('tahun') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            @if ($pakaiPj)
                                <div class="col-md-8 mb-3">
                                    <label class="form-label" for="pj">Penanggung jawab</label>
                                    <input type="text" id="pj" name="pj" maxlength="150" list="saran-pj"
                                        autocomplete="off"
                                        class="form-control @error('pj') is-invalid @enderror"
                                        value="{{ old('pj', $informasi->pj) }}">
                                    <datalist id="saran-pj">
                                        @foreach ($saran['pj'] as $s)
                                            <option value="{{ $s }}">
                                        @endforeach
                                    </datalist>
                                    @error('pj') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            @endif
                        </div>

                                                <div class="mb-3">
                            <label class="form-label" for="dokumen">Berkas dokumen (PDF)</label>

                            @if ($informasi->dokumen)
                                <div class="mb-2">
                                    <a href="{{ Storage::disk('public')->url($informasi->dokumen) }}" target="_blank" rel="noopener noreferrer">
                                        Lihat berkas saat ini
                                    </a>
                                </div>
                            @endif

                            <input type="file" id="dokumen" name="dokumen" accept="application/pdf"
                                class="form-control @error('dokumen') is-invalid @enderror">
                            <div class="form-text">
                                Format PDF, maksimal 5 MB.
                                @if ($informasi->dokumen)
                                    Kosongkan jika tidak ingin mengganti berkas yang sudah ada.
                                @else
                                    Kosongkan jika dokumen belum tersedia.
                                @endif
                            </div>
                            @error('dokumen') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="form-check form-switch mb-4">
                            <input type="hidden" name="tampil" value="0">
                            <input class="form-check-input" type="checkbox" role="switch" id="tampil" name="tampil"
                                value="1" @checked((bool) old('tampil', $informasi->tampil ? 1 : 0))>
                            <label class="form-check-label" for="tampil">Tampilkan di situs publik</label>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">{{ $edit ? 'Simpan perubahan' : 'Simpan' }}</button>
                            <a href="{{ route('informasi.index', $kategori) }}" class="btn btn-outline-secondary">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection